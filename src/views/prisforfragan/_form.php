<?php

use kartik\slider;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker;

?>


<?php \yii\widgets\Pjax::begin(); ?>

<?php $form = ActiveForm::begin([
        'method' => 'post'
]);

if($model->hasErrors()){
    foreach ($model->getErrorSummary(true) as $error){
        echo Html::tag('p',$error,['style'=>'color:red']).'<br/>';
    }
}


?>

<div class="row price_quiry" style="margin-bottom:15px;margin-top: 15px;">
    <div class="col-sm-12 wow slideInDown" data-wow-duration="2s"><h4><?= Yii::t('app','Grundläggande information:')?></h4></div>
</div>
    <div class="row">
        <div class="col-sm-5 radio wow slideInDown" data-wow-duration="2s">
            <?= $form->field($model, 'type')->radioList(['Privat Person'=>'Privat person','Företag'=>'Företag'])?>
        </div>
        <div class="col-sm-7 radio wow slideInDown" data-wow-duration="2.5s">
            <?= $form->field($model, 'service')->radioList(yii\helpers\ArrayHelper::map($services,'name','name'))?>
        </div>
    </div>



    <div class="row" style="margin-bottom:15px;margin-top: 15px;">
        <div class="col-sm-12 wow slideInDown" data-wow-duration="2s"><h5><?= Yii::t('app','Kontaktuppgifter :')?></h5></div>
    </div>

    <div class="row">
        <div class="col-sm-6 wow slideInDown" data-wow-duration="2.5s"><?= $form->field($model, 'name')?></div>
        <div class="col-sm-6 wow slideInDown" data-wow-duration="3s"><?= $form->field($model, 'number') ?></div>
    </div>

    <div class="row">
        <div class="col-sm-6 wow slideInDown" data-wow-duration="2s"><?= $form->field($model, 'email')?></div>
        <div class="col-sm-6 wow slideInDown" data-wow-duration="2.5s"><?= $form->field($model, 'phone')?> </div>

    </div>

    <div class="row">
            <div class="col-sm-6">
                <div class="wow slideInDown changelabel" data-wow-duration="2s"><h5 id="h5" style="margin-bottom:15px;margin-top: 15px;" data-oldlabel="<?= Yii::t('app','Nuvurande bostad:')?>"><?= Yii::t('app','Nuvurande bostad')?></h5></div>
                <div class="wow slideInDown changelabel" data-wow-duration="2s"><?= $form->field($model, 'current_address')->textInput()->label('Adress')?></div>
                <div class="wow slideInDown changelabel" data-wow-duration="2s"><?= $form->field($model, 'current_postnr')->textInput()?></div>
                <div class="wow slideInDown changelabel" data-wow-duration="2s"><?= $form->field($model, 'current_city')->textInput()->label('Stad')?></div>
                <div class="wow slideInDown changelabel" data-wow-duration="2.5s"><?= $form->field($model, 'current_living_space')->textInput(['id'=>'id_one'])->label('Bostadsyta i kvm')?></div>
                <div class="wow slideInDown new-address" data-wow-duration="2s"><?= $form->field($model, 'current_residence_floor')->textInput()->label('Våning på aktuell adress')?></div>
                <div class="radio wow slideInDown " data-wow-duration="2.5s"><?= $form->field($model, 'current_residence')->radioList(['Lägenhet'=>'Lägenhet','Villa/Hus'=>'Villa/Hus'])?></div>
                <?php
                if(isset($service->name) && $service->name!='Flyttstädning'){
                ?>
                <div class="radio wow slideInDown new-address" data-wow-duration="2s"><?= $form->field($model, 'current_residence_lift')->radioList(['Ingen hiss'=>'Ingen hiss','Liten'=>'Liten','Mellan'=>'Mellan','Stor'=>'Stor'])?></div>
           <?php } ?>
            </div>
            <?php
            if(isset($service->name) && $service->name!='Flyttstädning'){
                ?>
                <div class="col-sm-6 new-address">
                    <div class="wow slideInDown" data-wow-duration="2.5s"><h5 style="margin-bottom:15px;margin-top: 15px;"><?= Yii::t('app','Adressen till nya bostaden :')?></h5></div>
                    <div class="wow slideInDown" data-wow-duration="2.5s"><?= $form->field($model, 'new_address')->textInput()->label('Adress')?></div>
                    <div class="wow slideInDown" data-wow-duration="2.5s"><?= $form->field($model, 'new_postnr')->textInput() ?></div>
                    <div class="wow slideInDown" data-wow-duration="2.5s"><?= $form->field($model, 'new_city')->textInput()->label('Stad') ?></div>
                    <div class="wow slideInDown" data-wow-duration="3s"><?= $form->field($model, 'new_living_space')->textInput()->label('Bostadsyta i kvm')?></div>
                    <div class="wow slideInDown" data-wow-duration="2.5s"><?= $form->field($model, 'new_residence_floor')->textInput()->label('Våning på ny adress')?></div>
                    <div class="radio wow slideInDown" data-wow-duration="3s"><?= $form->field($model, 'new_residence')->radioList(['Lägenhet'=>'Lägenhet','Villa/Hus'=>'Villa/Hus'])?></div>
                    <div class="radio wow slideInDown" data-wow-duration="2.5s"><?= $form->field($model, 'new_residence_lift')->radioList(['Ingen hiss'=>'Ingen hiss','Liten'=>'Liten','Mellan'=>'Mellan','Stor'=>'Stor'])?></div>
                </div>
        <?php
            }
            ?>
        </div>
    <div class="row">
        <div class="col-sm-12 radio wow slideInDown" data-wow-duration="2.5s"><?= $form->field($model, 'grid_deductions')->radioList(['Ja'=>'Ja','Nej'=>'Nej'])?></div>
    </div>
<?php
if(isset($service->name) && $service->name!='Flyttstädning'){
?>
    <div class="row new-address" id="counted_cubic">
        <div class="col-sm-12">
            <?= $form->field($model, 'counted_cubic')->textInput()?>
            <?= $form->field($model, 'kubik')->hiddenInput()->label(false)?>
        </div>
    </div>
<?php } ?>
    <div class="row justify-content-center">

        <div class="col-sm-6">
            <?= $form->field($model, 'other_info')->textarea()?>

            <?= $form->field($model,'date')->widget(DatePicker::class,[
                'type' => DatePicker::TYPE_INLINE,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'dd-M-yyyy',
                    'todayHighlight' => true
                ]
            ])?>
            <?= $form->field($model, 'reCaptcha')->widget(
                \himiklab\yii2\recaptcha\ReCaptcha2::className()

            ) ?>
            <div class="form-group">
                <?= Html::submitButton('Skicka', ['class' => 'btn','id'=>'priceinquery-submitbtn']) ?>
            </div>
        </div>

    </div>





<?php ActiveForm::end();

$this->registerJs("$('#priceinquery-submitbtn').on('click',function(){localStorage.cubic_total = 0;    localStorage.removeItem('kubik'); });",\yii\web\View::POS_END);
$this->registerJs("
String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
$('input[name=\'PriceInquiry[service]\']') 
    .change(function(){
    var label = $('.changelabel');
    var labels = label.children().find('label');
    var heading = $('#h5');
        if( $(this).is(':checked') ){ 
            var val = $(this).val();
           
            if(val==='Flyttstädning'){
            $('.new-address').hide();
            labels.each(function(i){
           var lab = $(labels[i]);
           lab.attr('oldLabel',lab[0].innerHTML);
           lab.html(lab.attr('oldLabel').replace('Nuvarande ','').capitalize());
      
           heading.html(heading.attr('data-oldLabel').replace('Nuvarande ','').capitalize())
     
           });
           
            }else{
              $('.new-address').show();
              labels.each(function(i){
           var lab = $(labels[i]);
           lab.html(lab.attr('oldLabel'));
             heading.html(heading.attr('data-oldLabel'))
    
           });
            }
        }
    });
 
$('#radio').on('click',function(){
});
",\yii\web\View::POS_END);
?>

<?php \yii\widgets\Pjax::end(); ?>
