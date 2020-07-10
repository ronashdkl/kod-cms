<?php

namespace ronashdkl\kodCms\modules\admin\actions;

use yii\base\Action;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\helpers\VarDumper;

/**
 * Class SaveAction
 * @package ronashdkl\kodCms\modules\admin\actions

 */
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
           $errors = null;

           foreach ($this->controller->model->getErrors()??[] as $err){
               $errors.=$err[0]."\n ";
           }
            \Yii::$app->session->setFlash('error', $errors??'failed to save!');
            return $this->controller->redirect(Url::to(['index']));
        }


    }
}