<?php


use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\data\ArrayDataProvider;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

$this->title = Yii::t('app', 'About');
$this->params['breadcrumbs'][] = Yii::t('app', $this->title);


?>


<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">General</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">List</a></li>


    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php
            $form = ActiveForm::begin(['action' => Url::to(['update'])]);
            ?>
            <div class="">
                <?php
                echo \ronashdkl\kodCms\widgets\config\FormFieldWidget::widget([
                    'model' => $model,
                    'form' => $form
                ])

                ?>


                <?= $this->render('_action') ?>

            </div>
            <?php ActiveForm::end() ?>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
            <div class="panel-heading">

                <?php
                echo GridView::widget([
                    'id' => 'crud-datatable',
                    'pjax' => true,
                    'dataProvider' => new ArrayDataProvider([
                        'allModels' => $model->list,
                        'pagination' => [
                            'pageSize' => 10,
                        ],
                    ]),
                    'toolbar' => [
                        ['content' =>
                            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['add-list'],
                                ['role' => 'modal-remote', 'title' => 'Create new List', 'class' => 'btn btn-default', 'data-pjax' => 0]) .
                            Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                                ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                            '{toggleData}' .
                            '{export}'
                        ],
                    ],
                    'columns' => [
                        [
                            'class' => 'kartik\grid\CheckboxColumn',
                            'width' => '20px',
                        ],
                        ['class' => 'yii\grid\SerialColumn'],
                        'text',
                        ['class' => 'yii\grid\ActionColumn',
                            'contentOptions' => ['style' => 'width: 8.7%'],
                            'template' => '{update}{delete}',
                            // 'visible'=> Yii::$app->user->isGuest ? false : true,
                            'buttons' => [

                                'update' => function ($url, $model, $index) {

                                    $t = ['add-list', 'key' => $index];
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to($t), ['class' => 'btn btn-default btn-xs custom_button', 'role' => 'modal-remote']);
                                },
                                'delete' => function ($url, $model, $index) {
                                    $t = ['add-list', 'key' => $index];
                                    return Html::a('<span class="glyphicon glyphicon-remove"></span>', Url::to($t), ['class' => 'btn btn-default btn-xs custom_button', 'role' => 'modal-remote', 'data-request-method' => 'delete', 'data-confirm-title' => 'Are you sure?',
                                        'data-confirm-message' => 'Are you sure want to delete this item']);
                                },
                            ],
                        ]

                    ],
                    'panel' => [
                        'type' => '',
                        'heading' => null,
                        'before' => '<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                        'after' => BulkButtonWidget::widget([
                                'buttons' => Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                                    ["bulk-delete"],
                                    [
                                        "class" => "btn btn-danger btn-xs",
                                        'role' => 'modal-remote-bulk',
                                        'data-confirm' => false, 'data-method' => false,// for overide yii data api
                                        'data-request-method' => 'post',
                                        'data-confirm-title' => 'Are you sure?',
                                        'data-confirm-message' => 'Are you sure want to delete this item'
                                    ]),
                            ]) .
                            '<div class="clearfix"></div>',
                    ]
                ])
                ?>
            </div>
        </div>

    </div>
    <!-- /.tab-content -->
</div>