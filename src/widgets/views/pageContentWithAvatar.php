<?php
/**
 * @var $this \yii\base\View;
 */

$imgHtml = '<div id="sidebar"  class="col-sm-5 sidebar" >
                <div class="sidebar__inner">
                    <img src="'.$avatar.'" alt="Placeholder" class="img-fluid wow slideInLeft" data-wow-duration="2.5s">
                </div>

            </div>'
?>
<style>
    p{
        text-align:start;
    }

</style>
<section id="page-content" class="container p-sm-5 bg-white">
    <div class="row">
        <div class="col-sm-12 text-capitalize text-center section_title" style="padding: 20px;">
            <h4 class="font-weight-bold" style="font-size: 26px"><?= $title?></h4>

            <div class="title_border"></div>
        </div>
    </div>
    <div id="main-content" class="row">

        <?=(!$position)?$imgHtml:null?>
        <!--description-->
        <div  id="content"  class="col-sm-7 p-sm-2 content" style="background: rgba(255, 255, 255, 0.86);">
            <div class="wow fadeIn summary content-body" data-wow-duration="2s">
                <?=\yii\helpers\Html::decode($content)?>
            </div>
        </div>
        <?=($position)?$imgHtml:null?>
    </div>
</section>
