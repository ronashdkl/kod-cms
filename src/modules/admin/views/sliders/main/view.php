<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\SliderMain */
?>
<div class="slider-main-view center">
 <?=\yii\helpers\Html::img($model->getImage(),['class'=>'img-thumbnail','style'=>'width:50%'])?>
    <br>

<?=$model->button;?>
</div>
