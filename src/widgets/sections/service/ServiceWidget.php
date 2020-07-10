<?php


namespace ronashdkl\kodCms\widgets\sections\service;


use ronashdkl\kodCms\models\service\ServiceModel;
use ronashdkl\kodCms\widgets\sections\SectionWidget;

class ServiceWidget extends SectionWidget
{

    public static function navId()
    {
       return "Service";
    }

    public function run()
    {
        parent::run();
        return $this->render('index',['model'=>new ServiceModel()]);
    }
}