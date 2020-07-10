<?php


namespace ronashdkl\kodCms\modules\admin\controllers\blocks;


use ronashdkl\kodCms\models\detail\DetailModel;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;

class DetailBoxController extends AdminSiteController
{
public $modelClass = DetailModel::class;
}