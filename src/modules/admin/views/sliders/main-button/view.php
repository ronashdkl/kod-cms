<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\SliderMainButton */
?>
<div class="slider-main-button-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slider_main_id',
            'code',
        ],
    ]) ?>

</div>
