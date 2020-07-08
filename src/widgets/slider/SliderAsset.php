<?php


namespace ronashdkl\kodCms\widgets\slider;


use yii\web\AssetBundle;

class SliderAsset extends AssetBundle
{
public $sourcePath = '@app/widgets/slider/dist';

public $js=[
    'jssor.slider.min.js',
    'slider.js',
];
public $depends = [
    'yii\web\JqueryAsset'
];
}
