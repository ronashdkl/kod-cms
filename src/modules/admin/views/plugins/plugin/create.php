<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model lo\plugins\models\Plugin */

$this->title = Yii::t('plugin', 'Create Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('plugin', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-create">
    <?= $this->render('../_menu') ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
