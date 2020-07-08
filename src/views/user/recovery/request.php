<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\models\LoginForm;
use dektrium\user\widgets\Connect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Recover your password');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 to_animate">
    <div class="with_border with_padding">

        <h4 class="text-center">
            <?= Html::encode($this->title) ?>
        </h4>
        <hr class="bottommargin_30">
        <div class="wrap-forms">
            <?php $form = ActiveForm::begin([
                'id' => 'password-recovery-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-primary btn-block']) ?><br>

            <?php ActiveForm::end(); ?>
</div>
    </div>
</div>

