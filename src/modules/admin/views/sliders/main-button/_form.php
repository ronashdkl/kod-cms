<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\SliderMainButton */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-main-button-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slider_main_id')->widget(\kartik\select2\Select2::class,[
            'data'=>\yii\helpers\ArrayHelper::map(\ronashdkl\kodCms\modules\admin\models\SliderMain::find()->asArray()->all(),'id','title')
    ]) ?>

    <?= $form->field($model, 'code')->widget(\dosamigos\ckeditor\CKEditor::class,[
            'preset'=>'full'
    ]) ?>


	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
