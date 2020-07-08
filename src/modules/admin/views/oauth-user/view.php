<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\models\OauthUsers */
?>
<div class="oauth-users-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'password',
            'first_name',
            'last_name',
        ],
    ]) ?>

</div>
