<?php

use yii\helpers\Url;
use yii\web\JsExpression;
$url = Yii::$app->request->referrer;
if($url==null){
    $url = '/';
}
?>

<section class="m-t-80 p-b-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <a href="/"> <img src="<?=$this->params['config']('logo')?>" style="width: 80%"></a>
            </div>
            <div class="col-lg-6">
                <div class="text-left">
                    <h1 class="text-medium"><?=Yii::t('site','Ooops, This Page Could Not Be Found!')?></h1>
                    <p class="lead"><?=Yii::t('site','The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.')?></p>
                    <div class="seperator m-t-20 m-b-20"></div>
                    <div class="search-form">
                        <?=\yii\helpers\Html::a(Yii::t('site','Go Back'),$url,['class'=>'btn btn-primary'])?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
