<?php

namespace ronashdkl\kodCms\widgets\sections\footer;

use ronashdkl\kodCms\models\menu\MenuModel;
use ronashdkl\kodCms\widgets\sections\SectionWidget;
use yii\base\Widget;
use Yii;

class FooterWidget extends SectionWidget
{


    public function run()
    {
        parent::run();

        /*if(Yii::$app->appData->isHome()){
            return $this->render('home');
        }*/
        return $this->render('default');
    }

    public static function navId()
    {
        return 'footerSection';
    }
}
