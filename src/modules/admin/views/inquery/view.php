<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\models\PriceInquiry */
?>
<div class="price-inquiry-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'service',
            'date',
            'name',
            'number',
            'email:email',
            'phone',
            'current_address',
            'current_living_space',
            'current_residence',
            'current_residence_lift',
            'current_residence_floor',
            'new_address',
            'new_living_space',
            'new_residence',
            'new_residence_lift',
            'new_residence_floor',
            'floor',
            'grid_deductions',
            'counted_cubic',
            'other_info:ntext',
            'find_us',
            'status',
            'date_time',
        ],
    ]) ?>

</div>
