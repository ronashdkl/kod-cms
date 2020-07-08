<?php


namespace ronashdkl\kodCms\modules\admin\models\behaviours;


use ronashdkl\kodCms\modules\admin\models\Post;
use Imagine\Image\Box;
use Imagine\Image\Point;
use yii\base\Behavior;
use yii\helpers\VarDumper;
use yii\imagine\Image;
use Yii;

class ApiSaveFileBehaviour extends Behavior
{
    public $isApi;
    public function events()
    {
        return [
            Post::BEFORE_SAVE => 'saveMedia',
         //   Post::EVENT_AFTER_FIND=>'test'

        ];
    }

    public function saveMedia()
    {
        if($this->isApi){
            $this->apiSaveImages();
            $this->apiSaveAvatar();
        }

    }

    public function cropAvatar($img)
    {
        $file = Yii::getAlias('@webroot'.$img);
        $image = Image::thumbnail($file,'320','240');
        $size = $image->getSize();
        $white = Image::getImagine()->create(new Box(320, 240));
        $thumbnail = $white->paste($image, new Point(320 / 2 - $size->getWidth() / 2, 240 / 2 - $size->getHeight() / 2));
        $dir = Yii::getAlias('@webroot/media/post/avatar');
        if(!is_dir($dir)){
            mkdir($dir,0777,true);
        }
        $fileName = uniqid('avatar_').'.jpg';
        $image->save(Yii::getAlias('@webroot/media/post/avatar/'.$fileName));
        return '/media/post/avatar/'.$fileName;
    }
    public function apiSaveAvatar()
    {
        if(!isset($this->owner->avatarImage['src'])){
            return;
        }
        //$this->owner->avatar = $this->owner->avatarImage['src'];
        $img = str_replace('https://rescuesale.se/sites/default/files/','/media/files/',$this->owner->avatarImage['src']);
        $this->owner->avatar = $this->cropAvatar($img);
        return true;
    }



    public function apiSaveImages()
    {
        if ($this->owner->imageFiles) {

            $dbImages = [];

            foreach ($this->owner->imageFiles as $imageFile) {
                if (!isset($imageFile['src'])) {
                    return;
                }
                $dbImages[] = str_replace('https://rescuesale.se/sites/default/files/','/media/files/',$imageFile['src']);
                //$dbImages[] =$imageFile['src'];
            }
            $this->owner->log = "Images saved into " . $this->owner->title;
            $this->owner->images = json_encode($dbImages);

            return true;
        }
    }

}