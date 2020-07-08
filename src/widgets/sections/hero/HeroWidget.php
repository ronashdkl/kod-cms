<?php


namespace ronashdkl\kodCms\widgets\sections\hero;


use kartik\base\Widget;

class HeroWidget extends Widget
{
public function run()
{
    parent::run();
    return $this->render('hero');
}
}
