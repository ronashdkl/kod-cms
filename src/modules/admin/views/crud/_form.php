<?php

use ronashdkl\kodCms\modules\admin\exceptions\MethodException;
use ronashdkl\kodCms\modules\admin\exceptions\ModelException;
use ronashdkl\kodCms\widgets\config\FormFieldWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin();
if ($model->hasProperty('published')) {
    $model->published = 1;
}

?>
<div class="panel">
    <div class="panel-body">
        <?php
        if($model->hasMethod('formTypes')){
           echo FormFieldWidget::widget([
                'model' => $model,
                'form' => $form
            ]);
        }else{
            throw new MethodException('formTypes is not declare in model');
        }

        ?>
    </div>
    <div class="panel-footer">
        <?php if (!Yii::$app->request->isAjax) { ?>
            <div class="form-group ">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

        <?php } ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

