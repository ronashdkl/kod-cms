<?php
use yii\helpers\Url;

    $action =  [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to([$action,'id'=>$key]);
        },
        'visibleButtons' => [
            'delete' => function ($model, $key, $index) {
                return Yii::$app->user->can('*');
            },
            'update' => function ($model, $key, $index) {
                return Yii::$app->user->can('*');
            }
        ],
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
            'data-request-method'=>'post',
            'data-toggle'=>'tooltip',
            'data-confirm-title'=>'Are you sure?',
            'data-confirm-message'=>'Are you sure want to delete this item'],
    ];


return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
        'visible'=>Yii::$app->user->can('*')
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'log',
        'format' => 'raw'
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_at',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'created_by',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ip_address',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'created_at',
    ],
   $action,

];
