<?php
/**
 * @var $model AboutModel
 */


use ronashdkl\kodCms\models\about\AboutModel;

?>
<style>
    p{
        text-align:start;
    }
</style>
<section id="<?=$this->context::navId()?>" class="container p-sm-5 bg-white">
        <div id="main-content" class="row">
            <?php
            if($model->image){
            ?>
            <!--image section-->
            <div id="sidebar"  class="col-sm-5 sidebar" style="margin-top: 40px;">
                <div class="sidebar__inner">
                    <img src="<?= $model->image?>" alt="Placeholder" class="img-fluid wow slideInLeft" data-wow-duration="2.5s">
                </div>

            </div>
            <?php } ?>
            <!--description-->
            <div  id="content"  class="col-sm-7 p-sm-2 content" style="background: rgba(255, 255, 255, 0.86);">
                <div class="section_title text-center">
                    <h5 id="om-oss" class="wow slideInDown" data-wow-duration="2s"><?=$model->title?></h5>
                    <div class="title_border slideInDown" data-wow-duration="2.5s"></div>
                </div>
                <div class="wow fadeIn summary content-body" data-wow-duration="2s">
                    <?= \yii\helpers\Html::decode($model->summary)?>
                </div>
            </div>
        </div>
    </section>


