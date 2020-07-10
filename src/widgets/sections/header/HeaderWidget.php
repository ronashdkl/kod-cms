<?php
namespace ronashdkl\kodCms\widgets\sections\header;

use ronashdkl\kodCms\models\header\HeaderModel;
use ronashdkl\kodCms\models\menu\MenuModel;
use ronashdkl\kodCms\widgets\sections\SectionWidget;
use yii\base\Widget;
use Yii;

class HeaderWidget extends SectionWidget
{




    public function run()
   {
       parent::run();

      // return $this->render($model->mode,['model'=>$model,'isHome'=>$isHome]);
       return $this->render('light',['model'=>new HeaderModel()]);
   }

    public static function navId()
    {
        return 'header';
    }
}
