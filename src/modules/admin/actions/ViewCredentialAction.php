<?php


namespace ronashdkl\kodCms\modules\admin\actions;


use ronashdkl\kodCms\config\AppData;
use ronashdkl\kodCms\models\OauthClients;
use ronashdkl\kodCms\modules\admin\models\Post;
use Yii;
use yii\base\Action;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\Response;

class ViewCredentialAction extends Action{

    public function runWithParams($project_id)
    {
        $request = Yii::$app->request;
        $model = Post::find()->where(['project_id'=>$project_id])->credentails()->published()->one();

        //$model->body = $this->controller->renderAjax('/post/_credentialTemplate');
        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;


            if ($request->isGet){

                if($model==null){
                    return [
                        'title' => "Empty Credential",
                        'content' => 'Please create new credential to view it. ',
                        'footer' => Html::a('Create', '/admin/post/create-credential',['class' => 'btn btn-default pull-left', 'role' => "modal-remote"]).
                            Html::button('Close', ['class' => 'btn btn-danger pull-left', 'data-dismiss' => "modal"])


                    ];
                }
                return [
                    'title' => "View Credential",
                    'content' => $this->controller->renderAjax('/credential/view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"])


                ];
            }
        }

    }
}
