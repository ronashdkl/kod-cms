<?php
    use dosamigos\ckeditor\CKEditor;
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\captcha\Captcha;
?>
<?php $form = ActiveForm::begin([
        'action' => '/sv/kontakt/send',
        'method'=>'post'
]); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="wow slideInDown" data-wow-duration="2s"><?= $form->field($model, 'full_name')->textInput()?></div>
            <div class="wow slideInDown" data-wow-duration="2.4s"><?= $form->field($model, 'email')->textInput()?></div>
            <div class="wow slideInDown" data-wow-duration="2s"><?= $form->field($model, 'phone')->textInput()?></div>
            <div class="wow slideInDown" data-wow-duration="2.4s"><?= $form->field($model, 'address')->textInput()?></div>

        </div>
        <div class="col-sm-6">
            <div class="wow fadeIn" data-wow-duration="2s">
                <?= $form->field($model, 'message')->textarea(['rows'=>6])?>
                <?= $form->field($model, 'reCaptcha')->widget(
                    \himiklab\yii2\recaptcha\ReCaptcha2::className()
                ) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Skicka', ['class' => 'btn btn-default btn_form']) ?>
    </div>

<?php ActiveForm::end(); ?>
