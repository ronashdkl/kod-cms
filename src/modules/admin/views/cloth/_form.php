<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Cloth */
/* @var $form yii\widgets\ActiveForm */
?>
<?= \yii\helpers\VarDumper::dump($model->getErrorSummary(true),10,1)?>
<div class="cloth-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'media')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*',
            'multiple' => true],
        'pluginOptions' => [
                'showPreview' => true,
        'showCaption' => false,
        'showRemove' => false,
        'showUpload' => false,
        'showCancel' => true,
            'initialPreview' => [],
            'initialPreviewAsData' => true,
            'initialCaption' => "The Moon and the Earth",
            'initialPreviewConfig' => [
                ['caption' => 'Moon.jpg', 'size' => '873727'],
                ['caption' => 'Earth.jpg', 'size' => '1287883'],
            ],
            'overwriteInitial' => false,
            //'maxFileSize' => 2800
        ]
    ]); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'min_order')->textInput() ?>

    <?= $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
