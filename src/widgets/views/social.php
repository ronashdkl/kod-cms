<?php

?>
<!-- section -->
<section id="fbk" class="container-fluid m-sm-2">
    <div class="row justify-content-center">
        <!--facebook plugin-->
        <div class="col-sm-4 text-center p-sm-5 wow slideInDown" data-wow-duration="2s">
            <div class="section_title text-center">
                <h5 class="wow slideInDown" data-wow-duration="2s"><?= Yii::t('app','HITTA OSS PÅ FACEBOOK');?></h5>
                <div class="title_border slideInDown" data-wow-duration="2.5s"></div>
            </div>
<?=$this->params['social']('facebook')->code?>
        </div>
        <!--request a price quote-->
           </div>
</section>
