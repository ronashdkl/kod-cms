<?php
/**
 * @var $this \yii\base\View;
 */

?>

<section id="page-content" class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-capitalize text-center section_title" style="padding: 20px;">
                <h4 class="font-weight-bold" style="font-size: 26px"><?= $title?></h4>

                <div class="title_border"></div>
            </div>
        </div>
        <div class="content-body" ><?=\yii\helpers\Html::decode($content)?></div>
    </div>

</section>
