<?php


namespace ronashdkl\kodCms\widgets\sections\price;


use ronashdkl\kodCms\models\price\PriceModel;
use ronashdkl\kodCms\widgets\sections\SectionWidget;

class PriceWidget extends SectionWidget
{

    public static function navId()
    {
       return "PriceWidget";
    }
    public function run()
    {
        parent::run();
        return $this->render('index',['model'=>new PriceModel()]);
    }
}