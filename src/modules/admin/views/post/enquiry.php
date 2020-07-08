<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
       'full_name',
        'email',
        'created_at',
    ],
]);


echo Html::tag('div',$model->message,['class'=>'well well-sm']);
$form = ActiveForm::begin();

echo $form->field($model,'seen')->checkbox([1=>'Yes',0=>'No']);
ActiveForm::end();

?>