<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\models\PriceInquiry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="price-inquiry-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'current_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'current_living_space')->textInput() ?>

    <?= $form->field($model, 'current_residence')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'current_residence_lift')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'current_residence_floor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_living_space')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_residence')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_residence_lift')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_residence_floor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grid_deductions')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'counted_cubic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'find_us')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_time')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('site', 'Create') : Yii::t('site', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
