<?php
use ronashdkl\kodCms\modules\admin\viewModels\SliderModel;
use kartik\file\FileInput;

$this->title = 'Slider';
?>

<?php
$form = \yii\widgets\ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data']
]);
$media = $model->getMedia();
?>

<?php

$config = [];
if($media!=null) {
    foreach ($media as $img) {

        $config[] = ['url' => ['/admin/api/remove-slider'], 'key' =>$img];
    }
}
echo $form->field($model, 'media')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*',
        'multiple' => true],
    'pluginOptions' => [
        'showPreview' => true,
        'showCaption' => false,
        'showRemove' => false,
        'showUpload' => false,
        'showCancel' => true,
        'initialPreview' => ($media==null)?[]:$media,
        'initialPreviewAsData' => true,
        'overwriteInitial' => true,
        'initialPreviewConfig' => $config,
        //'maxFileSize' => 2800
    ]
]); ?>

<?php
\yii\widgets\ActiveForm::end();

?>

