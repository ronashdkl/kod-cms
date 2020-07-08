<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\models\OauthClients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oauth-clients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>

    <?= $form->field($model, 'client_secret')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>

    <?= $form->field($model, 'redirect_uri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grant_type')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>

    <?php echo $form->field($model, 'scope')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\select2\Select2::class,[
            'data'=>\yii\helpers\ArrayHelper::map(\ronashdkl\kodCms\models\User::find()->asArray()->all(),'id','username')
    ]) ?>


	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
