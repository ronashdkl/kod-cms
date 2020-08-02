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
        return $this->redirect('/admin/plugin/index');
    }
    public function actionInstall($key){
        \Yii::$app->plugins->installPlugin($key);
        return $this->redirect('/admin/plugin/index');
    }
    public function actionUninstall($key){
        \Yii::$app->plugins->uninstallPlugin($key);
        return $this->redirect('/admin/plugin/index');
    }
    public function actionUpdate($key,$id){
     \Yii::$app->plugins->updatePlugin($key,$id);

        return $this->redirect('/admin/plugin/index');
    }


}