<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;

class SearchController extends Controller
{
    public function actionIndex()
    {
        $request = \Yii::$app->request;
        $key = ucfirst($request->getQueryParam('q'));
        $menu = \Yii::$app->getModule('admin')->getMenu();
        $data = array_search($key,array_column($menu, 'label'),1);
        if($data!=0 && isset($menu[$data]['url'])){
            $this->redirect($menu[$data]['url']);
       }else{
            return $this->redirect('/admin/post/index?PostSearch[title]='.$key);
        }

    }
}