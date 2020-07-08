<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Video */
?>
<div class="video-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'url:url',
            'featured',
            'published',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'removed_at',
            'removed_by',
        ],
    ]);
    echo \ronashdkl\kodCms\widgets\Player::widget([
            'code'=>$model->code,
        'width'=>'100%',
        'height'=>'650px'
    ]);
    ?>

</div>
