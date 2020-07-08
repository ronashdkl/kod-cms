<?php
/* @var $this \yii\web\View */

?>

<div id="cookieNotify" class="modal-strip <?=($this->context->top)?'modal-top':null?> cookie-notify background-<?=$this->context->background?>" data-delay="<?=$this->context->delay?>" data-expire="1" data-cookie-name="<?=$this->context->name?>" data-cookie-enabled="true">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 text-sm-center sm-center sm-m-b-10 m-t-5">This website uses cookies to ensure
                you get the best experience on our website. <a href="#" class="text-light"><span> More info <i class="fa fa-info-circle"></i></span></a></div>
            <div class="col-lg-4 text-right sm-text-center sm-center">
                <button type="button" class="btn btn-rounded btn-light btn-outline btn-sm m-r-10 modal-close">Decline</button>
                <button type="button" class="btn btn-rounded btn-light btn-sm modal-confirm">Got
                    it!</button>
            </div>
        </div>
    </div>
</div>
