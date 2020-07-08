<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\models\PriceInquiry */
/* @var $service ronashdkl\kodCms\modules\admin\models\Tree */
/* @var $form ActiveForm */
?>

<section class="container">
    <div class="main_content">
        <div class="row container">
            <?php if(yii::$app->session->hasFlash('success')):?>
                <div class="alert alert-success col-sm-12 ">
                    <?= Yii::$app->session->getFlash('success')?>
                </div>
            <?php endif;?>
                <!--section title-->

                <div class="col-sm-12 text-capitalize text-center section_title" style="padding: 20px;">
                    <h4 class="font-weight-bold" style="font-size: 26px"><?= $service->name?></h4>

                    <div class="title_border"></div>
                </div>
              <div class="content-body" style="padding:20px; text-align: center; margin-bottom:-30px">
                  <?=$prisContent->body?>
              </div>


                <!--forms-->
                    <div class="col-sm-8 offset-2">
                        <?php
                        if($service->display_form)
                        echo  $this->render('_form',['model'=>$model,'services'=>$services,'service'=>$service]);
                        ?>
        </div>
    </div>
</section>
