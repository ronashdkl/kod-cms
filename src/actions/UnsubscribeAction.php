<?php

namespace ronashdkl\kodCms\actions;

use ronashdkl\kodCms\modules\admin\models\Newsletter;
use yii\base\Action;
use yii\helpers\Html;
use yii\helpers\VarDumper;

class UnsubscribeAction extends Action
{
    public $uniqueId = 'subscribe';

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function runWithParams($params)
    {
        if(isset($params['email']) && $params['email']!=null){
            $newsL =Newsletter::find()->where(['email'=>$params['email']])->one();
            if($newsL!=null){
                if($newsL->delete()){

                    $this->controller->return['title'] = \Yii::t('site',"Unsubscribed");
                    $this->controller->return['content'] = \Yii::t('site',"Thank you! you have successfully unsubscribed our news letter");
                    $this->controller->return['footer'] =Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]);


                }else{
                    return $newsL->getFirstError('email');
                }
            }else{
                $this->controller->return['title'] = \Yii::t('site',"Unsubscribed");
                $this->controller->return['content'] = \Yii::t('site',"Thank you! you have successfully unsubscribed our news letter");
                $this->controller->return['footer'] =Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]);

            }

        }

        return $this->controller->send();
    }
}