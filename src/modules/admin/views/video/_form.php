<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Video */
/* @var $form yii\widgets\ActiveForm */
($model->isNewRecord)?$model->published=1:null;
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'body')->textarea() ?>

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <?= $form->field($model, 'published')->checkbox([1=>'Yes',0=>'No']) ?>
        </div>
        <div class="col-sm-12 col-md-6">
            <?= $form->field($model, 'featured')->checkbox([1=>'Yes',0=>'No']) ?>
        </div>
    </div>








	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
