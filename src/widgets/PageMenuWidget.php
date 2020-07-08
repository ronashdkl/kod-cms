<?php


namespace ronashdkl\kodCms\widgets;


use ronashdkl\kodCms\models\menu\MenuModel;
use ronashdkl\kodCms\models\WidgetModel;
use ronashdkl\kodCms\widgets\sections\SectionWidget;
use yii\base\Widget;
use yii\helpers\VarDumper;

class PageMenuWidget extends SectionWidget
{
public $list;
    public $modelClass;

    public static function navId()
    {
        return 'PageMenuWidget';
    }

    public function run()
    {
        parent::run();
        if($this->modelClass==null){
            $this->modelClass = MenuModel::class;
        }
        $model = new $this->modelClass();

        if(\Yii::$app->appData->isHome()){
            $isHome = true;
        }else{
            $isHome = false;
        }
        return $this->render('pageMenu',['model'=>$model,'isHome'=>$isHome]);
    }
}
