<?php
/* @var $this \yii\web\View */
?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap');
.kodknackare{
   font-family: 'Cormorant Garamond', serif;
background: #fff !important;
color: #f47920 !important;
padding: 3px 8px;
border-radius: 15px;
box-shadow: 1px 1px 2px 1px #00000057;
border: 0px;
}
    /*.supporter li{
        display: inline;

    }*/
    .supporter img{
        width:90%
    }
    .supporter{
       /*background: rgba(255, 255, 255, 0.08);*/
        padding: 10px 20px;

    }
    ul.supporter.two{
        /*background: rgba(0, 0, 0, 0.37);*/
        border-radius: 10%;
    }

</style>
<footer class="p-sm-3 text-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">

                <h4>VI STÖDJER</h4>
                <ul class="supporter two">
                    <li>
                        <a target="_blank" rel="alternate" href="//www.barncancerfonden.se/"><img src="/media/sodra.png" alt="barncancerfonden"></a>
                    </li>
                    <li>
                        <a target="_blank" rel="alternate" href="//www.skanestadsmission.se/"><img src="/media/skane.png" alt="skanestadsmission"></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-5">
                <ul>
                    <li><i class="ti ti-headphone-alt"></i>&nbsp;<?= $this->params['config']('phone')?></li>
                    <li><i class="ti ti-email"></i>&nbsp;<?= $this->params['config']('email')?></li>
                    <li><i class="ti ti-map-alt"></i>&nbsp;<?= $this->params['config']('address')?></li>
                    <li class="text-center"><h4 class="font-weight-bold"><?= Yii::t('site','Telefontider')?></h4></li>
                    <li><i class="ti ti-time"></i> Måndag - Fredag :  <?=$this->params['config']('mon_fri')?></li>
                    <li><i class="ti ti-time"></i>&nbsp;Lördag : <?=$this->params['config']('sat')?></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h4>VÅRA SAMARBETSPARTNER</h4>
                <ul class="supporter">
                    <li>
                        <a target="_blank" rel="alternate" href="//www.smartboxes.se/"><img src="/media/smartbox.png" alt="smartboxes"></a>
                    </li>  <li>
                        <a target="_blank" rel="alternate" href="//www.akeri.se/sv"><img src="/media/salogo.png" alt="akeri"></a>
                    </li>

                </ul>
            </div>


            <div class="col-sm-12 text-center p-sm-2 bottom_footer">
                &copy;&nbsp;Copyright&nbsp;<?= date('Y');?>&nbsp;|&nbsp;<?=Yii::t('site','All Right Reserved')?> &nbsp;|&nbsp;<?=Yii::t('site','Developed By')?> :
                <a class="kodknackare" rel="alternate" hreflang="sv_SE" href="https://www.kodknackare.nu" target="_blank" style="color: #fff;">KODKNACKARE</a>
            </div>
        </div>
    </div>
</footer>
