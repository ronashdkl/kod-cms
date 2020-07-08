<?php

namespace ronashdkl\kodCms\actions;
use yii\base\Action;

class NoticeAction extends Action
{
public $uniqueId = 'notice';

public function runWithParams($params)
{
    return $this->controller->send();
}
}