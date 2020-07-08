<?php
/* @var $this \yii\web\View */

?>
<?=\ronashdkl\kodCms\widgets\MovingTruck::widget()?>
<div class="banner-logo">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center" style="padding-top: 15px">

                <a rel="alternate" hreflang="sv" href="<?=Yii::$app->request->getBaseUrl()?>"><img src="<?= $this->params['config']('logo') ?>"
                                 alt="<?= $this->params['config']('name') ?>" class="img-fluid"></a>

            </div>

            <div class="center-content brand-info">
                Flytt & Transport
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-xl sticky-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <?php

                foreach ($model->orderList()->list as $list) {
                    if ($list->type == 'linkToCatalog'){
                        echo $this->render('partial/catalog',['list'=>$list]);
                    } elseif ($list->type == 'linkToPost') {
                        ?>
                        <li class="nav-item <?=$list->responsive_only?'responsive_only':null?>"><?= \yii\helpers\Html::a($list->name, ['/page/' . $list->{$list->type}],['class'=>'nav-link']) ?></li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item <?=$list->responsive_only?'responsive_only':null?>"><?= \yii\helpers\Html::a($list->name, $list->{$list->type},['class'=>'nav-link']) ?></li>
                    <?php }
                } ?>
            </ul>
        </div>
    </div>
</nav>
