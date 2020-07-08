<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\models\seo\SeoModel;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;

class SeoController extends AdminSiteController
{
public $modelClass = SeoModel::class;
}