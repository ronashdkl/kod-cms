<?php
use ronashdkl\kodCms\modules\admin\viewModels\SliderModel;
use kartik\file\FileInput;

$this->title = 'Slider';

$media = $model->getMedia();

foreach ($media as $img){
    echo $img;
}
?>


