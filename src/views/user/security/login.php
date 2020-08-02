<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use dektrium\user\models\LoginForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
  body{
     background:#ffb40a
  }

    .login-box {
        position: absolute;
        width: 100%;
        /*top: 10%;*/
        box-shadow: 0px 0px 20px 0px #232222;
        background: #fff8;
        border-radius: 50px 5px 50px 5px;
    }

</style>
<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row justify-content-center login-screen">

<div class="col-sm-12 col-lg-3 to_animate login-box">
    <div class="with_border with_padding mt-5">
        <h4 class="text-center">
            kodCMS
        </h4>
        <hr class="bottommargin_30">
        <div class="wrap-forms">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
                'validateOnBlur' => false,
                'validateOnType' => false,
                'validateOnChange' => false,
            ]) ?>

            <?php if ($module->debug): ?>
                <?= $form->field($model, 'login', [
                    'inputOptions' => [
                        'autofocus' => 'autofocus',
                        'class' => 'form-control',
                        'tabindex' => '1']])->dropDownList(LoginForm::loginList());
                ?>

            <?php else: ?>

                <?= $form->field($model, 'login',
                    ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]
                );
                ?>

            <?php endif ?>

            <?php if ($module->debug): ?>
                <div class="alert alert-warning">
                    <?= Yii::t('user', 'Password is not necessary because the module is in DEBUG mode.'); ?>
                </div>
            <?php else: ?>
                <?= $form->field(
                    $model,
                    'password',
                    ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])
                    ->passwordInput()
                    ->label(
                        Yii::t('user', 'Password')
                        . ($module->enablePasswordRecovery ?
                            ' (' . Html::a(
                                Yii::t('user', 'Forgot password?'),
                                ['/user/recovery/request'],
                                ['tabindex' => '5']
                            )
                            . ')' : '')
                    ) ?>
            <?php endif ?>

            <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '3']) ?>

            <?= Html::submitButton(
                Yii::t('user', 'Sign in'),
                ['class' => 'btn btn-primary btn-block', 'tabindex' => '4']
            ) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?php if ($module->enableConfirmation): ?>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
        </p>
    <?php endif ?>
    <?php if ($module->enableRegistration){ ?>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
        </p>
    <?php } ?>

    <?= Connect::widget([
        'baseAuthUrl' => ['/user/security/auth'],
    ]) ?>

</div>

    <?php
    $this->registerJs('  
    $(document).ready(function(){
       
        var height = $(window).height();
       $(".login-box").css("top",height*.15)
       
    });',$this::POS_END);
    ?>

</div>
