<?php


namespace ronashdkl\kodCms\modules\admin\actions;


use ronashdkl\kodCms\config\AppData;
use ronashdkl\kodCms\models\OauthClients;
use ronashdkl\kodCms\modules\admin\models\Post;
use Yii;
use yii\base\Action;
use yii\helpers\Html;
use yii\web\Response;

class CreateCredentialAction extends Action{

    public function runWithParams($project_id)
    {

        $request = Yii::$app->request;
        if(Post::find()->where(['project_id'=>$project_id])->credentails()->exists()){
            Yii::$app->session->setFlash('error','Credentials already created!');
            return $this->controller->redirect(['/admin/post/view','id'=>$project_id]);
        }
        $model = new Post();
        $model->tree_id = AppData::CREDENTAIL;
        $model->published = 1;
        $model->draft = 0;
        $model->project_id = $project_id;
        $model->body = $this->controller->renderAjax('/post/_credentialTemplate');
        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new Credentail",
                    'content' => $this->controller->renderAjax('/post/create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new Credentail",
                    'content' => '<span class="text-success">Create Credentail success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create-credentail'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Create new Credentail",
                    'content' => $this->controller->renderAjax('/post/create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->controller->redirect(['/admin/post/view', 'id' => $model->id]);
            }else {
                return $this->controller->render('/post/create', [
                    'model' => $model,
                ]);
            }
        }

    }
}
