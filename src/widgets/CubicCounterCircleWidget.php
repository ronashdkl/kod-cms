<?php


namespace ronashdkl\kodCms\widgets;


use yii\jui\Widget;

class CubicCounterCircleWidget extends Widget
{
public $link;
    public function run()
    {
        parent::run();
        if (strpos(\Yii::$app->request->getUrl(), 'kubik') !== false) {
           return null;
        }
        if($this->link==null){
            $this->link = '/kubik';
        }
        return $this->render('cubic_counter',['link'=>$this->link]);
    }
}
