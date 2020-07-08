<?php


namespace ronashdkl\kodCms\modules\api\controllers\v1;


use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;

class Controller extends \yii\rest\Controller
{
    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(), [
                'authenticator' => [
                    'class' => CompositeAuth::className(),
                    'except' => ['login','resetpassword'],
                    'authMethods' => [
                        HttpBasicAuth::className(),
                        HttpBearerAuth::className(),
                        [
                            'class'=> QueryParamAuth::className(),
                            'tokenParam'=>'access_token'
                        ]
                    ],
                ],
            ]
        );
    }
}
