<?php

namespace ronashdkl\kodCms\modules\api\controllers;



class DefaultController extends \yii\rest\Controller
{

    /**
     * Returns username and email
     */
    public function actionIndex()
    {
        $user = \Yii::$app->user->identity;
        return null;
        return [
            'username' => $user->username,
            'email' => $user->email,
        ];
    }


}
