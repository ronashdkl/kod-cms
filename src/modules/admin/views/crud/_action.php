<?php
use \yii\helpers\Url;
?>
<div <?= (isset($class))?'class="'.$class.'"':null ?> >
<a href="<?= \yii\helpers\Url::toRoute(['index'])?>" class="btn btn-success btn-sm">Index</a>
    <?php
    if($this->context->model->hasProperty('removed_at')){
        ?>
        <a href="<?= \yii\helpers\Url::toRoute(['trash'])?>" class="btn  btn-sm btn-danger">Trash</a>
    <?php
    }
    ?>

</div>
