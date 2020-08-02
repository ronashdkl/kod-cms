<?php
/**
 * @var BaseModel $model
 */

use ronashdkl\kodCms\models\BaseModel;
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\data\ArrayDataProvider;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


$this->params['breadcrumbs'][] = Yii::t('app', $this->title);
$listAttr = false;
$styleAttr = false;
if ($model->listAttribute!=null) {
    $listAttr = true;
}
if ($model->styleAttribute!=null) {
    $styleAttr = true;
}
if ($model->formTypes() != null) {
    $general = true;
} else {
    $general = false;
}
?>


    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <?php
            if ($general) {
                ?>
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">General</a></li>
                <?php
            }
            ?>

            <?php
            if ($listAttr) {
                ?>
                <li class="<?= (!$general) ? 'active' : null ?>"><a href="#list" data-toggle="tab"
                                                                    aria-expanded="false">List</a>
                </li>
                <?php
            }
            ?>
            <?php
            if ($styleAttr) {
                ?>
                <li class=""><a href="#style" data-toggle="tab" aria-expanded="false">Style</a></li>
                <?php
            }
            ?>


            <li class="pull-right"><a href="#tab_3" id="JsonEditor-click" onclick="" title="JSON" data-toggle="tab"
                                      aria-expanded="false" class="text-muted"><i class="fa fa-gear"></i></a></li>

        </ul>
        <div class="tab-content">
            <?php
            if ($general) {
                ?>
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
                <?php
            }
            ?>

            <!-- /.tab-pane -->
            <?php
            if ($listAttr) {
                ?>
                <div class="tab-pane <?= (!$general) ? 'active' : null ?>" id="list">
                    <div class="panel-heading">

                        <?php
                        $toolbar = ($model->listModel->hasMethod('getToolBar')) ? $model->listModel->getToolBar() : [
                            ['content' =>
                                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['add-list'],
                                    ['role' => 'modal-remote', 'title' => 'Create new List', 'class' => 'btn btn-default', 'data-pjax' => 0]) .
                                Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                                    ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                                '{toggleData}' .
                                '{export}'
                            ],
                        ];

                        echo GridView::widget([
                            'id' => 'crud-datatable',
                            'pjax' => true,
                            'dataProvider' => (isset($dataProvider))? $dataProvider: new ArrayDataProvider([
                                'allModels' => $model->list,
                                'pagination' => [
                                    'pageSize' => 10,
                                ],
                            ]),
                            'filterModel' => (isset($searchModel))? $searchModel: null,
                            'toolbar' => $toolbar,
                            'columns' => $model->listModel->getColumns(),
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
                                                'data-request-method' => 'POST',
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
                <?php
            }
            ?>
            <?php
            if ($styleAttr) {
                ?>
                <div class="tab-pane" id="style">
                    <div class="panel-heading">

                        <?php
                        $form = ActiveForm::begin(['action' => Url::to(['style'])]);
                        ?>
                        <div class="">
                            <?php
                            echo \ronashdkl\kodCms\widgets\config\FormFieldWidget::widget([
                                'model' => $model->style,
                                'form' => $form
                            ])

                            ?>


                            <?= $this->render('_action') ?>

                        </div>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="tab-pane" id="tab_3">
                <?php
                echo $this->render('_json', ['model' => $model]);
                ?>
            </div>
        </div>
        <!-- /.tab-content -->
    </div>

<?php
$this->registerJs('$(document).on("pjax:success", "#crud-datatable-pjax",function(event) {
        $.pjax.reload({container:"#jsoneditor-pjax"});
});');
if(Yii::$app->appData->logs!=null){
    $this->registerJs('$(document).on("pjax:success", "#crud-datatable-pjax",function(event) {
       $.pjax.reload({container:"#log-list"});
});');
}
?>
