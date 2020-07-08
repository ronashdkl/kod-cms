<?php

use yii\helpers\Html;
use \yii\helpers\Url;
?>
<div <?= (isset($class))?'class="'.$class.'"':null ?> >
<?= Html::submitButton('Save',['class'=>'btn btn-success'])?>

</div>
