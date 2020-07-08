<?php


namespace ronashdkl\kodCms\widgets;


use yii\base\Widget;

class BreadCrumbWidget extends Widget
{
public function run()
{
     parent::run();
if($this->view->title==null){
    return null;
}

    return $this->render('breadcrumb');
}
}
