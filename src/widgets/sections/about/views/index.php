<?php
/**
 * @var $model AboutModel
 */


use ronashdkl\kodCms\models\about\AboutModel;
use yii\base\Event;

?>
<!-- Details 2 -->
<div id="<?=$this->context::navId()?>" class="basic-2">
    <div class="container">
        <div id="main-content" class="row">
            <?php
            if($model->image && $model->image_position=='left'){
                ?>
                <!--image section-->
                <div id="sidebar"  class="col-sm-6 sidebar">
                    <div class="image-container sidebar__inner">
                        <img src="<?= $model->image?>" class="img-fluid wow slideInLeft" data-wow-duration="2.5s" alt="alternative">

                    </div>

                </div>
            <?php } ?>
       <!-- end of col -->
            <div id="content" class="col-lg-<?= ($model->image)?'6':'12'?>">
                <div class="text-container">
                    <h2><?=$model->title?></h2>
                   <?=\yii\helpers\Html::decode($model->summary)?>
                    <?php
                    if(Yii::$app->hooks->has_action($this->context::RENDER_LIST_MODEL)){
                        Yii::$app->hooks->do_action($this->context::RENDER_LIST_MODEL);
                    }else{
                    if($model->list){
                        echo '<ul class="list-unstyled li-space-lg">';
                        foreach ($model->list as $list){
                            ?>

                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body"><?=$list->answer?></div>
                                </li>


                    <?php
                        }
                        echo '</ul>';
                    }
                    }
                    ?>
                    </div> <!-- end of text-container -->
            </div> <!-- end of col -->
            <?php
            if($model->image && $model->image_position=='right'){
                ?>
                <!--image section-->
                <div id="sidebar"  class="col-sm-6 sidebar">
                    <div class="image-container sidebar__inner">
                        <img src="<?= $model->image?>" class="img-fluid wow slideInLeft" data-wow-duration="2.5s" alt="alternative">

                    </div>

                </div>
            <?php } ?>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-2 -->
<!-- end of details 2 -->



