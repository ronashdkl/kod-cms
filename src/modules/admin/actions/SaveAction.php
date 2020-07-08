<?php

namespace ronashdkl\kodCms\modules\admin\actions;

use yii\base\Action;
use yii\helpers\Url;
use yii\helpers\VarDumper;

class SaveAction extends Action
{
    public $uniqueId = 'updateData';
    public function runWithParams($params)
    {
        $request = \Yii::$app->request;

        if ($this->controller->model->load($request->post()) && $this->controller->model->save()) {
            \Yii::$app->session->setFlash('success', 'Saved!');
            return $this->controller->redirect(Url::to(['index']));
        } else {
            \Yii::$app->session->setFlash('error', 'failed to save!');
            return $this->controller->redirect(Url::to(['index']));
        }


    }
}