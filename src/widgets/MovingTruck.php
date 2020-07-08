<?php


namespace ronashdkl\kodCms\widgets;


use ronashdkl\kodCms\assets\AppAsset;
use yii\base\Widget;

class MovingTruck extends Widget
{
public function run()
{
    parent::run();
    $this->getView()->registerCssFile('/web/css/truck.css');
    $this->getView()->registerCssFile('/web/css/led.css');
    if($this->view->params['page'] == 'kubik'){
        $this->getView()->registerCssFile('/web/css/driving-full.css');
    }else{
        $this->getView()->registerCssFile('/web/css/driving.css');
    }
    $this->getView()->registerJsFile('/web/js/truck.js',['depends'=>AppAsset::class]);
    return $this->render('truck');
}
}
