<?php

namespace ronashdkl\kodCms\modules\admin\actions;

use yii\base\Action;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Response;

class BulkDeleteAction extends Action
{
    public $uniqueId = 'bulkDelete';

    public function init()
    {
        parent::init();
        \Yii::$app->response->format = Response::FORMAT_JSON;
    }
    public function runWithParams($params)
    {
        $request = \Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys

        if ($this->controller->model->deleteLists($pks)) {
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        }


    }
}