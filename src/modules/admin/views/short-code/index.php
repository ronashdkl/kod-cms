<?php


use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\data\ArrayDataProvider;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

$this->title = Yii::t('app', 'Short Codes');
$this->params['breadcrumbs'][] = Yii::t('app', $this->title);


?>


<div class="panel">
    <div class="panel-heading bg-primary">
         List
    </div>
    <div class="panel-body">
        <ul>
           <?php
           foreach ($tags as $key=>$value){
               echo Html::tag('li',$key. " - ". $value);
           }
           ?>
        </ul>
    </div>
</div>
