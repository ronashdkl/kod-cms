<?php

namespace ronashdkl\kodCms\modules\admin\actions;

use ronashdkl\kodCms\models\StyleModel;
use ronashdkl\kodCms\modules\admin\exceptions\ModelException;
use yii\base\Action;
use yii\helpers\Url;
use yii\helpers\VarDumper;

/**
 * Class StyleAction
 * @property StyleModel $styleModel
 * @package ronashdkl\kodCms\modules\admin\actions
 */
class StyleAction extends Action
{
    public $uniqueId = 'updateData';
    public $styleModel;
    public function init()
    {
        parent::init();
        if ($this->styleModel == null) {
            throw new ModelException($this->controller->model->styleClass.' is not declare in ' . $this->controller->model->nameOfClass);
        }
    }
    public function runWithParams($params)
    {
        $request = \Yii::$app->request;

        if ($this->styleModel->load($request->post()) && $this->styleModel->validate()) {
            $this->controller->model->style = $this->styleModel;
            if($this->controller->model->save()){
                \Yii::$app->session->setFlash('success', 'Saved!');
                return $this->controller->redirect(Url::to(['index']));
            }else{
                \Yii::$app->session->setFlash('error', 'failed to save Style!');
                return $this->controller->redirect(Url::to(['index']));
            }

        } else {
            \Yii::$app->session->setFlash('error', 'failed to validate Style!');
            return $this->controller->render(Url::to(['index']));
        }


    }
}