<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\ResendForm $model
 */

$this->title = Yii::t('user', 'Request new confirmation message');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col"></div>
<div class="col to_animate mt-5">
    <div class="with_border with_padding">

        <h4 class="text-center">
            <?= Html::encode($this->title) ?>
        </h4>
        <hr class="bottommargin_30">
        <div class="wrap-forms">
            <?php $form = ActiveForm::begin([
                'id' => 'resend-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-primary btn-block']) ?><br>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
    <div class="col"></div>
</div>
