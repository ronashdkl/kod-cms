<?php
$this->title = Yii::t('site','Contact');
?>
<section class="container">
    <div class="main_content contact">
        <div class="row container">
            <?php if(yii::$app->session->hasFlash('success')):?>
                <div class="alert alert-success col-sm-12 ">
                    <?= Yii::$app->session->getFlash('success')?>
                </div>
            <?php endif;?>
                <!--section title-->
                    <div  class="col-sm-12 text-center section_title" style="padding: 20px; text-transform:none">
                        <h4 class="font-weight-bold">Jag vill bli uppringd</h4>
                            <h5><?= Yii::t('app','Hos oss kan du alltid vara säker på att få kvalitet och erfaren personal.')?></h5>
                                <div class="title_border"></div>
                    </div>
                <!--forms-->
                    <div class="col-sm-8">
                        <?= $this->render('_form.php',['model'=>$model]);?>
                    </div>
            <!--info-->
                <div class="col-sm-4 text-center">
                    <div class="info wow fadeInDown" data-wow-duration="2s">
                        <i class="ti ti-tablet"></i>
                            <ul>
                                <li><a href="tel::+<?=$this->params['config']('phone')?>"><?=$this->params['config']('phone')?></a></li>
                            </ul>
                    </div>
                    <div class="info wow fadeInDown" data-wow-duration="2s">
                        <i class="ti ti-time"></i>
                            <ul>
                                <li>Måndag - Fredag :<?=$this->params['config']('mon_fri')?></li>
                                <li>Lördag&nbsp;: <?=$this->params['config']('sat')?></li>
                            </ul>
                    </div>
                    <div class="info wow fadeInDown" data-wow-duration="2.5s">
                        <i class="ti ti-email"></i>
                            <ul>
                                <li><a href="mailto::<?=$this->params['config']('email')?>"><?=$this->params['config']('email')?></a></li>
                            </ul>
                    </div>
                    <div class="info wow fadeInDown" data-wow-duration="3s">
                        <i class="ti ti-map-alt"></i>
                            <ul>
                                <li><?=$this->params['config']('address')?></li>
                            </ul>
                    </div>

                </div>
        </div>
    </div>
</section>

    <!--google maps-->
    <div id="google_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2252.991133625749!2d13.034135015925393!3d55.61956998051792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4653a3c0ee139c13%3A0x56be56f2aa52ed1c!2zSGFuw7ZnYXRhbiA1LCAyMTEgMjQgTWFsbcO2LCDgpLjgpY3gpLXgpL_gpKHgpYfgpKg!5e0!3m2!1sne!2snp!4v1591960581712!5m2!1ssv!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></section>
    </div>
