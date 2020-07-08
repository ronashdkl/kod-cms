<?php

namespace ronashdkl\kodCms\widgets\sections\error;

use yii\base\Widget;

class ErrorWidget extends Widget
{
    public $type = 404;

    public function run()
    {
        parent::run();
        if ($this->type == 404) {
            return $this->render('404');

        } else {
            return $this->render('500');

        }
    }
}
