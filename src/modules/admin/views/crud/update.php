<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Gallery */
$this->title = "Update Galary";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
