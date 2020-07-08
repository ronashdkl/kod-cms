<?php


namespace ronashdkl\kodCms\modules\admin\models;

use ronashdkl\kodCms\modules\admin\models\behaviours\Logbehaviour;
use Imagine\Image\Box;
use Imagine\Image\Point;
use Yii;
use yii\helpers\VarDumper;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * Class Profile
 * @package ronashdkl\kodCms\modules\admin\models
 */
class Profile extends \dektrium\user\models\Profile
{
    public $media;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'bioString' => ['bio', 'string'],
            'timeZoneValidation' => ['timezone', 'validateTimeZone'],
            'publicEmailPattern' => ['public_email', 'email'],
            'gravatarEmailPattern' => ['gravatar_email', 'email'],
            'websiteUrl' => ['website', 'url'],
            'nameLength' => ['name', 'string', 'max' => 255],
            'publicEmailLength' => ['public_email', 'string', 'max' => 255],
            'gravatarEmailLength' => ['gravatar_email', 'string', 'max' => 255],
            'locationLength' => ['location', 'string', 'max' => 255],
            'websiteLength' => ['website', 'string', 'max' => 255],
            'media' => ['media', 'safe'],
        ];
    }

    public function behaviors()
    {
        return [

            [
                'class' => Logbehaviour::class,
                'attribute' => 'name',
            ]

        ];
    }
    /**
     * Returns avatar url or null if avatar is not set.
     * @param int $size
     * @return string|null
     */
    public function getAvatarUrl($size = 200)
    {
        if ($this->avatar != null) {
            return $this->avatar;
        }
        return '//gravatar.com/avatar/' . $this->gravatar_id . '?s=' . $size;
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {

        $media = UploadedFile::getInstance($this, 'media');

        if ($media != Null) {
            $savePath = \Yii::getAlias('@webroot/media/user/');
            if (!is_dir($savePath)) {
                mkdir($savePath, 0777, true);
            }
            $fileName =  $this->user->username . '.' . $media->extension;
            $imagine = Image::getImagine()->open(Yii::getAlias($media->tempName));
            $imagine->resize(new Box(200, 200));
            $imagine->save($savePath.'/'.$fileName);
            unlink($media->tempName);
            $this->avatar = '/media/user/' . $this->user->username . '.' . $media->extension;
        }

        return parent::beforeSave($insert);
    }


}
