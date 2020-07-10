<?php


namespace ronashdkl\kodCms\modules\admin\controllers\blocks;


use ronashdkl\kodCms\models\header\HeaderModel;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;

class HeaderController extends AdminSiteController
{
protected $modelClass = HeaderModel::class;
}