<?php

    namespace ronashdkl\kodCms\controllers;

    use yii\web\Controller;

    class KubikController extends Controller
    {
            public function actionIndex()
                {
                    $this->view->params['page'] = 'kubik';
                    \Yii::$app->appData->registerPageWidget();

                    return $this->render('index');
                }
    }
?>
