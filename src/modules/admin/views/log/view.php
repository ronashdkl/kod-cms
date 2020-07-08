<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Log */


?>

<div class="log-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'log:ntext',
            'created_at',
            'user.username',
            'ip_address',

            ['attribute' => 'Location',
                'value' => function ($model) {
                    $location = $model->getUserInfo('location');
                    if($location==null){
                        return null;
                    }
                    return "city: ".$location->city." | Country: " .$location->country;
                }],
            ['attribute' => 'Data',
                'value' => function ($model) {
                    $attributes = $model->getUserInfo('changedAttributes');
                    if($attributes==null){
                        return null;
                    }
                    $return  = null;
                    foreach ($attributes as $i=>$k){
                        $return .= "<strong>$i</strong>: <br/>".$k."<br/>";
                    }
                    return $return;
                },
                'format'=>'raw']
        ],
    ]) ?>
    <hr>
    <h4>Access From</h4>
    <?= $model->getUserInfo(); ?>
</div>
