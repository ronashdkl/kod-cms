<?php

namespace ronashdkl\kodCms\controllers;

use ronashdkl\kodCms\models\PriceInquiry;
use ronashdkl\kodCms\models\PrisModel;
use ronashdkl\kodCms\modules\admin\models\Tree;
use ronashdkl\kodCms\widgets\PageContentWidget;
use Yii;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;

class PrisforfraganController extends \yii\web\Controller
{

    public function actionIndex($service = null)
    {

        $model = new PriceInquiry();
        $serviceQuery = \ronashdkl\kodCms\modules\admin\models\Tree::find()->where(['id' => \ronashdkl\kodCms\config\AppData::SERVICES])->one();
        $services = $serviceQuery->children()->all();
        \Yii::$app->appData->registerPageWidget();
        if ($service != null) {
            $service = Tree::findOne(['name' => urldecode($service)]);

            if ($service == null) {
                throw new NotFoundHttpException();
            }
            $model->service = $service->name;
            Yii::$app->view->title = $model->service;
            if($service->post){
                return $this->renderContent(PageContentWidget::widget(['model' => $service->post]));
            }
        }

           Yii::$app->view->title = 'Prisförfrågan';
           $service = new Tree(['name'=>'Prisförfrågan']);
           $service->display_form = true;
           $prisText = new PrisModel();

        if ($model->load(Yii::$app->request->post())) {
            $model->kubik = ($model->kubik!=null)?json_decode($model->kubik,true):null;
            if ($model->validate()&&$model->notifyAdmin()) {
                Yii::$app->session->setFlash('success', Yii::t('site','Thank you for your intrest. We will contact you soon'));

                return $this->render('index', ['model' => new PriceInquiry(), 'services' => $services, 'service' => $service,'prisContent'=>$prisText]);

            } else {
                return $this->render('index', ['model' => $model, 'services' => $services, 'service' => $service,'prisContent'=>$prisText]);
            }
        }
        return $this->render('index', ['model' => $model, 'services' => $services, 'service' => $service,'prisContent'=>$prisText]);
    }

    public function actionCleaning()
    {
        \Yii::$app->appData->registerPageWidget();
            if(Yii::$app->request->get('form')==true){
                return $this->redirect(['prisforfragan/index','cleaning'=>true]);
            }
        return $this->render('cleaning');
    }
}
