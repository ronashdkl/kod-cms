<?php

namespace ronashdkl\kodCms\modules\admin\models;

use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\post\PostEnquiry;
use ronashdkl\kodCms\models\post\PostLanguageFilter;
use ronashdkl\kodCms\models\UserProject;
use ronashdkl\kodCms\modules\admin\models\behaviours\ApiSaveFileBehaviour;
use ronashdkl\kodCms\modules\admin\models\behaviours\LanguageBehaviour;
use ronashdkl\kodCms\modules\admin\models\behaviours\Logbehaviour;
use Imagine\Image\Box;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\VarDumper;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $project_id
 * @property int $tree_id
 * @property string $slug
 * @property string $title
 * @property string $images
 * @property string $body
 * @property int $draft
 * @property int $featured
 * @property int $published
 * @property string $schedule_date
 * @property string $published_date
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property string $removed_at
 * @property int $removed_by
 * @property string $language
 * @property string $tag
 * @property string $avatar
 * @property boolean $sticky_avatar
 * @property boolean $avatar_position
 * @property boolean $completed
 * @property boolean $running
 * @property boolean $hide_language
 * @property Tree $catalog
 * @property UserProject[] $userProject
 * @property User[] $users
 */
class Post extends \yii\db\ActiveRecord
{
    const BEFORE_SAVE = 'before_save';
    const AFTER_SAVE = 'after_save';
    const SOFT_DELETE = 'soft_delete';

    const TYPE_PROJECT = 'project';
    const TYPE_CREDENTIAL = 'credential';
    const TYPE_TICKET = 'ticket';

    public $avatarImage;
    public $imageFiles;
    public $media;
    public $log = null;
    private $saved = false;
    const AVATAR_POSITION = [
        0=>'Left',
        1=>'Right'
    ];

    public function init()
    {

        $this->on(self::AFTER_SAVE, [$this, 'setAvatar']);
        $this->on(self::AFTER_SAVE, [$this, 'setImages']);

        $this->on(self::BEFORE_SAVE, [$this, 'restore']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'ensureUnique' => true
            ],
            BlameableBehavior::className(),
            [
                'class' => TimestampBehavior::className(),
                'value' => date('Y-m-d h:i')
            ],
            [
                'class' => Logbehaviour::class,
                'attribute' => 'title',
            ],
            [
                'class' => LanguageBehaviour::class,
                'languageAttributes' => [
                    'title',
                    'body'
                ]
            ]

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return Yii::$app->hooks->apply_filters('post_rules', [
            [['tree_id', 'project_id', 'draft', 'featured', 'published', 'created_by', 'updated_by', 'removed_by'], 'integer'],
            [['title'], 'required'],
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'slug', 'tag', 'avatar', 'body'], 'safe'],
            ['body', 'string'],
            ['images', 'string'],
            [['schedule_date', 'published_date', 'created_at', 'updated_at', 'removed_at', 'hide_language','avatar_position'], 'safe'],
            ['avatarImage', 'safe'],
            ['imageFiles', 'safe'],
            // ['imageFiles','file','maxFiles' => 5],
            [['slug'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 200],
            ['media', 'safe'],
            [['running', 'completed','sticky_avatar'], 'safe'],

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tree_id' => Yii::t('app', 'Catalog'),
            'catalog.name' => Yii::t('app', 'Catalog'),
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
            'images' => Yii::t('app', 'Images'),
            'body' => Yii::t('app', 'Body'),
            'draft' => Yii::t('app', 'Draft'),
            'featured' => Yii::t('app', 'Featured'),
            'published' => Yii::t('app', 'Publish'),
            'schedule_date' => Yii::t('app', 'Schedule Date'),
            'published_date' => Yii::t('app', 'Published Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'removed_at' => Yii::t('app', 'Removed At'),
            'removed_by' => Yii::t('app', 'Removed By'),

            'avatarImage' => Yii::t('app', 'Avatar'),
            'running' => Yii::t('app', 'Running'),
        ];
    }

    public function formTypes()
    {
        return Yii::$app->hooks->apply_filters('post_fields',[
            'title'=>[
                'type'=>FieldConfig::INPUT
            ],
            'body'=>[
                'type'=>FieldConfig::CKEDITOR
            ]
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Tree::className(), ['id' => 'tree_id']);
    }

    public function getCredential()
    {
        return $this->hasOne(self::className(), ['project_id' => 'id'])->credentials();

    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        };
        if ($this->validate()) {
            if ($this->triggerEvent) {
                $this->trigger(self::BEFORE_SAVE);
            }
            return true;
        } else {
            return false;
        }

    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->trigger(self::AFTER_SAVE);
    }

    /**
     * @return string avatar
     */
    public function getavatar()
    {


        return $this->avatar;


    }


    /**
     * @return void|null setAvatar()
     */
    public function setAvatar()
    {
        if ($this->saved) {
            return;
        }


        $imageFiles = UploadedFile::getInstance($this, 'avatarImage');

        if ($imageFiles == null) {

            return;
        }

        if ($imageFiles->tempName == null) {
            return;
        }
        if ($this->getavatar() != null) {
            $this->unlinkAvatar();
        }
        $savePath = Yii::getAlias('@webroot/media/post/' . $this->id);
        if (!is_dir($savePath)) {
            mkdir($savePath, 0777, true);
        }
        $imagine = Image::getImagine()->open(Yii::getAlias($imageFiles->tempName));
        $imagine->resize(new Box(400, 400));
        $fileName = uniqid() . '.jpg';
        $imagine->save($savePath . '/' . $fileName);
        $img = '/media/post/' . $this->id . '/' . $fileName;
        $this->avatar = $img;
        $this->log = "Avatar saved into " . $this->title;
        unlink($imageFiles->tempName);
        $this->saved = true;
        $this->save();
        return;

    }

    /**
     * @return string avatar
     */
    public function getImages()
    {


        return json_decode($this->images, true);


    }

    public function setImages()
    {
        if ($this->saved) {
            return;
        }

        $imageFiles = UploadedFile::getInstances($this, 'imageFiles');

        if ($imageFiles == null) {
            return null;
        }
        $dbImages = $this->getImages();
        if ($dbImages == null) {
            $dbImages = [];
        }
        foreach ($imageFiles as $imageFile) {
            if ($imageFile->tempName == null) {
                return;
            }
            /*if ($this->getImages() != null) {
                $this->unlinkImages();
            }*/


            $savePath = Yii::getAlias('@webroot/media/post/' . $this->id . '/images');
            if (!is_dir($savePath)) {
                mkdir($savePath, 0777, true);
            }
            $imagine = Image::getImagine()->open(Yii::getAlias($imageFile->tempName));
            $imagine->resize(new Box(600, 800));
            $fileName = uniqid() . '.jpg';
            $imagine->save($savePath . '/' . $fileName);
            $img = '/media/post/' . $this->id . '/images/' . $fileName;
            $dbImages[] = $img;
            unlink($imageFile->tempName);
        }
        $this->log = "Images saved into " . $this->title;
        $this->saved = true;
        $this->images = json_encode($dbImages);
        $this->save();
        return;

    }

    /**
     * @throws \yii\base\ErrorException
     */
    public function unlinkAvatar()
    {
        $cpath = Yii::getAlias('@webroot/media/post/' . $this->id);
        if (is_dir($cpath)) {
            FileHelper::removeDirectory($cpath);
            $this->avatar = null;
        }
    }

    /**
     * @throws \yii\base\ErrorException
     */
    private function unlinkImages()
    {
        $cpath = Yii::getAlias('@webroot/media/post/' . $this->id . '/images');
        if (is_dir($cpath)) {
            FileHelper::removeDirectory($cpath);
        }
    }

    /**
     * @param bool $hard
     * @return bool|false|int
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function delete($hard = false)
    {
        if ($hard) {
            return parent::delete(); // TODO: Change the autogenerated stub
        } else {
            if ($this->removed_by != null) {
                return $this->delete(true);
            }
            $this->removed_at = date('Y-m-d h:i');
            $this->removed_by = Yii::$app->user->identity->getId();
            $this->reset();
            $this->trigger(self::SOFT_DELETE);
            $this->triggerEvent = false;
            return $this->save(false);
        }
    }

    /**
     * @return bool
     */
    public function restore()
    {
        if ($this->removed_by == null) {
            return null;
        }
        if ($this->published == 0 && $this->draft == 0) {
            return null;

        }
        $this->removed_by = null;
        $this->removed_at = null;
        $this->triggerEvent = false;
        return $this->save();
    }

    /**
     * Restore from trash
     */
    private function reset()
    {
        $this->published = 0;
        $this->draft = 0;
        $this->featured = 0;
    }

    /**
     * @return bool
     * @throws \yii\base\ErrorException
     */
    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }
        $this->unlinkAvatar();
        return true;
    }

    /**
     * @return bool
     */
    public function isRemoved()
    {
        if ($this->removed_by == null) {
            return false;
        } else {

            return true;
        }
    }

    public function getEnquiries()
    {
        return $this->hasMany(PostEnquiry::class, ['post_id' => 'id'])->andWhere(['seen' => null]);
    }

    public function getProject()
    {
        return $this->hasOne(self::class, ['id' => 'project_id'])->projects();

    }

    public function getTickets()
    {
        return $this->hasMany(self::class, ['id' => 'project_id'])->tickets();
    }

    public function getUserProject()
    {
        return $this->hasMany(UserProject::class, ['project_id' => 'id']);
    }

    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])
            ->via('userProject');
    }

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\activeQuery\PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \ronashdkl\kodCms\modules\admin\models\activeQuery\PostQuery(get_called_class());
    }
}
