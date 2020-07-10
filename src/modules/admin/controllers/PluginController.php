<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\models\plugin\PluginModel;
use ronashdkl\kodCms\models\post\PostWidgetModel;
use ronashdkl\kodCms\widgets\sections\details\PostDetailWidget;
use yii\helpers\VarDumper;
use yii\web\Controller;

class PluginController extends Controller
{


    public function actionIndex(){

        return $this->render('index',['model'=>PluginModel::getInstance(),'list'=>\Yii::$app->plugins->list]);
    }
    public function actionStatus($key){
        \Yii::$app->plugins->disablePlugin($key);
        return $this->redirect('index');
    }
}