<?php


namespace ronashdkl\kodCms\widgets\cookies;


use ronashdkl\kodCms\widgets\sections\SectionWidget;
use yii\base\Widget;

class CookiesWidget extends SectionWidget
{
    public $name = 'cookiesPrompt';
    public $delay = 300;
    public $background='dark';
    public $top=true;

    public static function navId(){
        return 'CookiesWidget';
    }

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();
        return $this->render('index');
    }

}
