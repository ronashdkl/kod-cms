<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\models\social\FacebookModel;
use ronashdkl\kodCms\modules\admin\actions\SaveAction;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;



class FacebookController extends AdminSiteController
{
    public $modelClass = FacebookModel::class;
    public function actions()
    {
        return [
            'update'=>SaveAction::class
        ];
    }
}