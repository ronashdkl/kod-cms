<?php


namespace ronashdkl\kodCms\modules\admin\controllers\blocks;


use ronashdkl\kodCms\models\price\PriceModel;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;

class PriceController extends AdminSiteController
{
public $modelClass = PriceModel::class;
}