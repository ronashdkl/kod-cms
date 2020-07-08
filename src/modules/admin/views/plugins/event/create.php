<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model lo\plugins\models\Event */

$this->title = Yii::t('plugin', 'Create Event');
$this->params['breadcrumbs'][] = ['label' => Yii::t('plugin', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-create">
    <?= $this->render('../_menu') ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
