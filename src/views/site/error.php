<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="mt-5">
<?php
echo \ronashdkl\kodCms\widgets\sections\error\ErrorWidget::widget();
?>
</div>
