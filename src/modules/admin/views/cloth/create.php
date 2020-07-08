<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Cloth */

$this->title = 'Create Cloth';
$this->params['breadcrumbs'][] = ['label' => 'Cloths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">New Cloth</h3>
        <div class="card-options">
            <a href="<?= \yii\helpers\Url::toRoute(['index'])?>" class="btn btn-primary btn-sm">Index</a>
        </div>
    </div>
    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
          </div>

</div>
