<?php


namespace ronashdkl\kodCms\widgets;


use yii\jui\Widget;

class SocialSectionWidget extends Widget
{
public function run()
{
    parent::run();
    return $this->render('social');
}
}
