<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\models\contact\Contact */
?>
<div class="contact-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'full_name',
            'email:email',
            'subject',
            'created_at',
        ],
    ]) ?>
<div class="well well-lg">
    <?=Html::encode($model->message);?>
</div>
</div>
