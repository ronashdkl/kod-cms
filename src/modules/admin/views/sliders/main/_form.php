<?php

use ronashdkl\kodCms\components\FieldConfig;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\SliderMain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-main-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class=><a href="#mediaDiv" data-toggle="tab"
                          aria-expanded="true">Media</a></li>
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">General</a></li>


            <?php

            foreach (Yii::$app->appData->language->list as $lang) {
                ?>
                <li class=><a href="#<?= $lang->code ?>" data-toggle="tab"
                              aria-expanded="true"><?= $lang->name ?></a></li>
            <?php }
            ?>



        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'summary')->widget(CKEditor::className(), [
                    'options' => ['rows' => 2],
                    'preset' => 'basic'
                ]) ?>

                <?= $form->field($model, 'button')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'snow')->radioList([1=>'Yes',0=>'No']) ?>

                <?= $form->field($model, 'text_class')->radioList(['text-dark'=>'Dark','text-light'=>'White']) ?>

            </div>
            <?php
            foreach (Yii::$app->appData->language->list as $lang) {
                ?>
                <div class="tab-pane" id="<?= $lang->code ?>">
                    <div class="row" style="padding: 0px 10px">
                        <?php
                            foreach ($model->languageAttributes as $attr) {
                                $field = $form->field($model, 'languageAttribute[' . $attr . '_' . $lang->code . ']')->label(ucfirst($attr));
                                switch ($model->formTypes()[$attr]['type']) {
                                    case FieldConfig::INPUT:
                                        echo $field->textInput();
                                        break;
                                    case FieldConfig::CKEDITOR:
                                        echo $field->widget(CKEditor::className(), [
                                            'options' => ['rows' => 2],
                                            'preset' => 'basic'
                                        ]);
                                        break;
                                }
                            }

                        ?>
                    </div>

                </div>
            <?php }
            ?>
            <div class="tab-pane" id="mediaDiv">

                <?php
                $imgs = [];
                if($model->image!=null) {
                    $imgs = $model->getImage();
                }
                echo $form->field($model, 'sliderImage')->widget(FileInput::classname(), [
                    'options' => [
                        'accept' => 'image/*',
                        'multiple' => false,
                    ],
                    'pluginOptions' => [
                        'showPreview' => true,
                        'showCaption' => true,
                        'showRemove' => false,
                        'showUpload' => false,
                        'showCancel' => true,
                        'initialPreview' => $imgs,
                        'initialPreviewAsData' => true,
                        'overwriteInitial' => true,
                    ]
                ]); ?>

            </div>

        </div>

    </div>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
