<?php
/* @var $this \yii\web\View */
$this->title = 'Home';
if (!isset($widgets)){
    $widgets = [];
}
?>

<?php

foreach ($widgets as $widget){
    echo $widget::widget();
}

?>

