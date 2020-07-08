<?php


namespace ronashdkl\kodCms\modules\admin\controllers\config;


use ronashdkl\kodCms\models\menu\MenuModel;
use ronashdkl\kodCms\models\post\PostWidgetModel;
use ronashdkl\kodCms\models\WidgetModel;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;

/**
 * Class PageController
 * @package ronashdkl\kodCms\modules\admin\controllers
 */
class WidgetController extends AdminSiteController
{
    public $modelClass = WidgetModel::class;

}
