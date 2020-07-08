<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\models\about\AboutModel;

use ronashdkl\kodCms\models\service\ServiceModel;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;

/**
 * Class AboutController
 * @package ronashdkl\kodCms\modules\admin\controllers
 */
class ServicesController extends AdminSiteController
{
    public $modelClass = ServiceModel::class;


}
