<?php

?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <!-- Text Logo - Use this if you don't have a graphic logo -->
    <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

    <!-- Image Logo -->
    <a class="navbar-brand logo-image" href="/"><img src="<?=$this->params['config']('logo')??'/images/logo.svg';?>" alt="alternative"></a>

    <!-- Mobile Menu Toggle Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-awesome fas fa-bars"></span>
        <span class="navbar-toggler-awesome fas fa-times"></span>
    </button>
    <!-- end of mobile menu toggle button -->

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
       <ul class="navbar-nav ml-auto">
           <?php

           foreach ($model->orderList()->list as $list) {
               if ($list->type == 'linkToCatalog'){
                   echo $this->render('partial/catalog',['list'=>$list]);
               } elseif ($list->type == 'linkToPost') {
                   ?>
                   <li class="nav-item <?=$list->responsive_only?'responsive_only':null?>"><?= \yii\helpers\Html::a($list->name, ['/page/' . $list->{$list->type}],['class'=>'nav-link ']) ?></li>
                   <?php
               } else {
                   ?>
                   <li class="nav-item <?=$list->responsive_only?'responsive_only':null?>"><?= \yii\helpers\Html::a($list->name, $list->{$list->type},['class'=>'nav-link page-scroll']) ?></li>
               <?php }
           } ?>
       </ul>
        <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a target="_blank" href="<?=$this->params['social']('facebook')->url?>">
                        <i class="fas fa-circle fa-stack-2x facebook"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a target="_blank" href="<?=$this->params['social']('instagram')->url?>">
                        <i class="fas fa-circle fa-stack-2x twitter"></i>
                        <i class="fab fa-instagram fa-stack-1x"></i>
                    </a>
                </span>
            </span>
    </div>
</nav> <!-- end of navbar -->


