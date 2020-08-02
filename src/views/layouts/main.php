<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
/* @var $this \yii\web\View */

/* @var $content string */

use lo\modules\noty\Wrapper;
use yii\helpers\Html;
use ronashdkl\kodCms\assets\AppAsset;

AppAsset::register($this);
if($this->title==null){
    $this->title = $this->params['config']('name');
}

$this->beginPage(); ?>
<html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Site Icons -->
     <meta name="msapplication-TileColor" content="#ff6601">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link rel="icon" href="/images/favicon.png">
    <meta name="theme-color" content="#ff6601">
    <!-- Stylesheets & Fonts -->
    <?php $this->head() ?>
</head>
<body data-spy="scroll" data-target=".fixed-top">
<?php $this->beginBody() ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/sv_SE/sdk.js#xfbml=1&version=v5.0"></script>
<!-- Preloader -->
<div id="kodCms-loading" class="spinner-wrapper">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- end of preloader -->
<!-- Body Inner -->
<div>
      <!-- Header -->

    <!-- end: Header -->
    <?php

    if (isset($this->blocks['top_content'])) {
        echo $this->blocks['top_content'];
    }
    if (isset($this->blocks['side_content'])) {
        ?>
        <div class="row">
            <div class="col-sm-12 col-sm-8">
                <?= $content; ?>
            </div>
            <div class="col-sm-12 col-sm-4">
                <?= $this->blocks['side_content']; ?>
            </div>
        </div>
        <?php
    } else {


            echo $content;


    }

    if (isset($this->blocks['bottom_content'])) {
        echo $this->blocks['bottom_content'];
    }
    ?>

</div>

<!-- end of copyright -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
