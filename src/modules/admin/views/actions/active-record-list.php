<?php


use johnitvn\ajaxcrud\BulkButtonWidget;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = ucfirst($this->context->id);
?>

<?=GridView::widget([
    'id'=>'crud-datatable',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'pjax'=>true,
    'columns' => [
        [
            'class' => 'kartik\grid\CheckboxColumn',
            'width' => '20px',
        ],
        [
            'class' => 'kartik\grid\SerialColumn',
            'width' => '30px',
        ],
        [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'title',
        ],
        [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'updated_at',
        ],

        [
            'class' => 'kartik\grid\ActionColumn',
            'dropdown' => false,
            'vAlign'=>'middle',
            'urlCreator' => function($action, $model, $key, $index) {
                return Url::to(['/admin/projects/'.$action,'id'=>$key]);
            },
            'viewOptions'=>['title'=>'View','data-toggle'=>'tooltip','data-pjax'=>0],
            'updateOptions'=>['title'=>'Update', 'data-toggle'=>'tooltip','data-pjax'=>0],
            'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
                'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                'data-request-method'=>'post',
                'data-toggle'=>'tooltip',
                'data-confirm-title'=>'Are you sure?',
                'data-confirm-message'=>'Are you sure want to delete this project'],
        ],

    ],
    'toolbar'=> [
        ['content'=>
            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                ['title'=> 'Create new Galleries','class'=>'btn btn-default','data-pjax'=>0]).
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
            '{toggleData}'.
            '{export}'
        ],
    ],
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'panel' => [
        'type' => '',
        'heading' => '<i class="glyphicon glyphicon-list"></i>',
        'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
        'after'=>BulkButtonWidget::widget([
                'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                    ["bulk-delete"] ,
                    [
                        "class"=>"btn btn-danger btn-xs",
                        'role'=>'modal-remote-bulk',
                        'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                        'data-request-method'=>'post',
                        'data-confirm-title'=>'Are you sure?',
                        'data-confirm-message'=>'Are you sure want to delete this item'
                    ]),
            ]).
            '<div class="clearfix"></div>',
    ]
])?>
