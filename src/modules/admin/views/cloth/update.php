<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Cloth */

$this->title = 'Update Cloth: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cloths', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cloth-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
