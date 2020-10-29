<?php


namespace ronashdkl\kodCms\modules\admin\models;

use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\modules\admin\models\behaviours\LanguageBehaviour;
use ronashdkl\kodCms\modules\admin\models\behaviours\Logbehaviour;
use creocoder\nestedsets\NestedSetsBehavior;
use Imagine\Image\Box;
use kartik\tree\Module;
use kartik\tree\TreeView;
use Yii;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;

/**
 * Class Tree
 * @package ronashdkl\kodCms\modules\admin\models
 * @property Post[] $posts
 */
class Tree extends \kartik\tree\models\Tree
{
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [[['language', 'avatar','link','display_form'], 'safe']]);
    }

    public function formTypes()
    {
        return [
            'name' => [
                'type' => FieldConfig::INPUT
            ],
            'avatar' => [
                'type' => FieldConfig::IMAGE
            ],
            'link' => [
                'type' => FieldConfig::INPUT
            ],
            'display_form' => [
                'type' => FieldConfig::CHECKBOX
            ],

        ];
    }



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tree';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        /**
         * @var Module $module
         */
        $module = TreeView::module();
        $settings = ['class' => NestedSetsBehavior::class] + $module->treeStructure;
        return empty($module->treeBehaviorName) ? [$settings, ['class' => LanguageBehaviour::class, 'languageAttributes' => [
            'name',
        ]]] : [$module->treeBehaviorName => $settings, ['class' => LanguageBehaviour::class, 'languageAttributes' => [
            'name',
        ]]];
    }

    public function beforeSave($insert)
    {
        $log = new Log([
            'log' => $this->name . " updated in " . $this->tableName(),
        ]);
        $log->detail['changedAttributes'] = $this->getDirtyAttributes();
        $log->save();

        if ($this->getOldAttribute('avatar') != $this->avatar) {
            $image = Image::getImagine()->open(Yii::getAlias('@webroot/'.$this->avatar));
            $image->resize(new Box(400, 400));
            $filename = uniqid().'.jpg';
            $file = Yii::getAlias('@webroot/media/tree/');
            if(!is_dir($file)){
                mkdir($file,0777,false);
            }
            $image->save($file.$filename);
            unlink(Yii::getAlias('@webroot/'.$this->avatar));
            $this->avatar ='/media/tree/'.$filename;
        }
        return parent::beforeSave($insert);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts(){
        return $this->hasMany(Post::class,['tree_id'=>'id']);
    }

    public function getPost(){
        return $this->hasOne(Post::class,['tree_id'=>'id']);

    }



    public function getCatalogs(){
        return $this->hasMany(self::className(), ['root' => 'id']);
    }

    public function getRootData()
    {
        return $this->hasOne(self::className(),['id'=>'root']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['catalog' => 'id']);
    }

}
