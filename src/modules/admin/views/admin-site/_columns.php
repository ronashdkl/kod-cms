<?php

use yii\helpers\Html;
use yii\helpers\Url;
return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    ['class' => 'yii\grid\SerialColumn'],
    "text",
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to(['add-list', 'key' => $index]);
        },
        'template' => '{update}{delete}',
        'updateOptions'=>['title'=>'Update', 'data-toggle'=>'tooltip','data-pjax'=>1,'role' => 'modal-remote'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
            'data-request-method'=>'delete',
            'data-toggle'=>'tooltip',
            'data-confirm-title'=>'Are you sure?',
            'data-confirm-message'=>'Are you sure want to delete this item'],
    ],

];

