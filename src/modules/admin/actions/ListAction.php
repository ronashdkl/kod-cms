<?php

namespace ronashdkl\kodCms\modules\admin\actions;

use ronashdkl\kodCms\modules\admin\exceptions\ModelException;
use yii\base\Action;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Response;

class ListAction extends Action
{
    public $uniqueId = 'addList';
    public $listModel;

    public function init()
    {
        parent::init();
        if ($this->listModel == null) {
            throw new ModelException($this->controller->model->listClass . ' is not declare in ' . $this->controller->id);
        }
    }

    public function runWithParams($params)
    {

        $request = \Yii::$app->request;
        if (!$request->isAjax) {
            return $this->controller->notFound();
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;


        if ($request->isPost) {
            if ($this->listModel->load($request->post()) && $this->listModel->validate()) {
                if (isset($params['id']) && $params['id'] != null) {
                    $this->controller->model->list[$params['id']] = $this->listModel;

                } else {
                    $this->controller->model->list[] = $this->listModel;
                }
                if ($this->controller->model->save()) {
                    return [
                        'forceReload' => '#crud-datatable-pjax',
                        'title' => "Success",
                        'content' => (isset($params['id'])) ? 'Successfully Updated!' : 'Successfully added!',
                        'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"])
                    ];
                } else {
                    return [
                        'title' => "Error",
                        'content' => 'Failed!',
                        'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"])
                    ];
                }
            } else {
                return [
                    'title' => "Add New List Item",
                    'content' => $this->controller->renderAjax('_addList', [
                        'model' => $this->listModel,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }

        } elseif ($request->isGet) {

            if (isset($params['key']) && $params['key'] != null) {
                $model = $this->controller->model->list[$params['key']];
                return [
                    'title' => "Update " . $model->id,
                    'content' => $this->controller->renderAjax('_addList', [
                        'model' => $model,
                        'key' => $params['key']
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];

            } else {
                return [
                    'title' => "Add New List Item",
                    'content' => $this->controller->renderAjax('_addList', [
                        'model' => $this->listModel,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        } elseif ($request->isDelete) {
            if (isset($params['key']) && $params['key'] != null && $this->controller->model->deleteList($params['key'])) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'forceClose' => true,
                ];

            } else {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Error",
                    'content' => 'Unable to remove' . $this->controller->model->list[$params['key']]->text,
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"])

                ];
            }
        }
    }
}