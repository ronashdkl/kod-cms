<?php
use \yii\helpers\Url;
?>
<div <?= (isset($class))?'class="'.$class.'"':null ?> >
<a href="<?= \yii\helpers\Url::toRoute(['index'])?>" class="btn btn-success btn-sm">View Published</a>
<a href="<?= \yii\helpers\Url::toRoute(['draft'])?>" class="btn btn-primary btn-sm">View Draft</a>
<a href="<?= \yii\helpers\Url::toRoute(['trash'])?>" class="btn btn-danger btn-sm">View Trash</a>
</div>
