<?php
namespace ronashdkl\kodCms\widgets\sections\header;

use ronashdkl\kodCms\models\menu\MenuModel;
use yii\base\Widget;
use Yii;

class HeaderWidget extends Widget
{
    public $modelClass;



    public function run()
   {
       parent::run();
       if($this->modelClass==null){
           $this->modelClass = MenuModel::class;
       }
       $model = new $this->modelClass();

       if(Yii::$app->appData->isHome()){
          $isHome = true;
       }else{
           $isHome = false;
       }

      // return $this->render($model->mode,['model'=>$model,'isHome'=>$isHome]);
       return $this->render('light',['model'=>$model,'isHome'=>$isHome]);
   }
}
