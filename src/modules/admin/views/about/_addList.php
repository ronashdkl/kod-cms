<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$url = (isset($key) && $key!=null)?['add-list','id'=>$key]:['add-list'];
$form = ActiveForm::begin(['action' => Url::to($url),'method' => 'post']);
echo \ronashdkl\kodCms\widgets\config\FormFieldWidget::widget([
    'model' => $model,
    'form' => $form
]);
ActiveForm::end();