<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\models\OauthClients */
?>
<div class="oauth-clients-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'client_id',
            'client_secret',
            'redirect_uri',
            'grant_type',
            'scope',
            'user_id',
        ],
    ]) ?>

</div>
