<?php

namespace ronashdkl\kodCms\widgets\sections\top;

use ronashdkl\kodCms\models\menu\MenuModel;
use yii\base\Widget;

class TopHeaderWidget extends Widget
{
    const TYPE_INFO = 1;
    const TYPE_NAVIGATION = 2;
    public $type = self::TYPE_INFO;
    public $color = '#ff6601';


    public function run()
    {
        parent::run();
        return $this->render('info',['model'=>new MenuModel()]);
    }
}
