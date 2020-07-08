<?php

namespace ronashdkl\kodCms\actions;

use ronashdkl\kodCms\models\service\ServiceModel;
use yii\base\Action;
use yii\helpers\Html;
use yii\helpers\VarDumper;

class ServiceAction extends Action
{
    public $uniqueId = 'service';

    public function runWithParams($params)
    {
        $service = new ServiceModel();
        $this->controller->return['title'] = $service->list[$params['id']]->title;
        $nextbtn = null;
        if(isset($service->list[$params['id']+1])){
            $nextbtn = Html::a('Next', ['/api/service','id'=>$params['id']+1],['class' => 'btn btn-info', 'role' => "modal-remote"]);
        }
        $this->controller->return['footer'] =$nextbtn.Html::button('Close', ['class' => 'btn btn-danger pull-left', 'data-dismiss' => "modal"]);
        $this->controller->return['content'] = $this->controller->renderAjax('service',['model'=>$service->list[$params['id']]]);

        return $this->controller->send();
    }
}