<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\models\about\AboutModel;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;

class TestDriveController extends AdminSiteController
{
public $modelClass = AboutModel::class;
}