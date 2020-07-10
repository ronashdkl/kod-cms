<?php


namespace ronashdkl\kodCms\modules\admin\controllers\blocks;

use ronashdkl\kodCms\models\client\ClientModel;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;

/**
 * Class AboutController
 * @package ronashdkl\kodCms\modules\admin\controllers
 */
class ClientsController extends AdminSiteController
{
    public $modelClass = ClientModel::class;


}
