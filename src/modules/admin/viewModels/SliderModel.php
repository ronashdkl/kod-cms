<?php


namespace ronashdkl\kodCms\modules\admin\viewModels;


use ronashdkl\kodCms\modules\admin\models\Log;
use Imagine\Gd\Imagine;
use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;
use yii\imagine\Image;
use yii\web\UploadedFile;

class SliderModel extends Model
{
    public $media;

    public function rules()
    {
        return [
            ['media', 'safe']
        ];
    }

    public function getMedia()
    {
        if (!is_dir(Yii::getAlias('@webroot/media/sliders/'))) {
        return [];
    }
        $files = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@webroot/media/sliders/'));
        if (isset($files[0])) {
            $url = [];
            foreach ($files as $index => $file) {
                $img = substr($file, strrpos($file, '/') + 1);

                if (substr($img, 0, 1) != '.') {
                    $url[] = "/media/sliders/" . $img;
                }
            }

            return $url;
        }
    }

    public function save()
    {
        $media = UploadedFile::getInstances($this, 'media');
        if ($media == null) {
            return false;
        }

        foreach ($media as $img) {
            $imagine = Image::resize($img->tempName,1280,533,false);
            $path = \Yii::getAlias('@webroot/media/sliders');
            if (!is_dir($path)) {
                mkdir($path, 0777);
            }
            $filename = uniqid('slider-') . '.' . $img->extension;
            $imagine->save($path . DIRECTORY_SEPARATOR . $filename);
            $log = new Log();
            $log->log = "Image uploaded into slider with Name: ".$filename;
            $log->save();
            unlink($img->tempName);
        }

        return true;
    }

}
