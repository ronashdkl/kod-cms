<?php


namespace ronashdkl\kodCms\modules\admin\controllers;




use yii\web\Controller;

class ShortCodeController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index',['tags'=>\Yii::$app->kodShortCodes->getList()]);
}
}
