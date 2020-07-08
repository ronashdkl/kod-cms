<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\models\about\AboutModel;


use ronashdkl\kodCms\models\portfolio\PortfolioModel;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;

/**
 * Class AboutController
 * @package ronashdkl\kodCms\modules\admin\controllers
 */
class PortfolioController extends AdminSiteController
{
    public $modelClass = PortfolioModel::class;


}
