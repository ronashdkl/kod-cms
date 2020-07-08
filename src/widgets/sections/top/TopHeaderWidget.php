<?php

namespace ronashdkl\kodCms\widgets\sections\top;

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
        if ($this->type == self::TYPE_INFO) {
            return $this->render('info');
        } else {
            return $this->render('navigation');

        }
    }
}
