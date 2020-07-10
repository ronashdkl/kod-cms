<?php
/* @var $this \yii\web\View */

?>
<!-- Header -->
<header id="header" class="header">
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h1><?= $model->title?></h1>
                        <p class="p-large"><?=$model->summary?></p>
                        <a class="btn-solid-lg page-scroll" href="<?=$model->button_link?>"><?=$model->button_text?></a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="<?=$model->image??'/images/header-teamwork.svg'?>" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of header-content -->
</header> <!-- end of header -->
<!-- end of header -->