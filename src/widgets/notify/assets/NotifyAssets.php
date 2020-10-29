<?php


namespace ronashdkl\kodCms\widgets\notify\assets;


use yii\web\AssetBundle;

class NotifyAssets extends AssetBundle
{
public $sourcePath = __DIR__.'/../resource/';
public $css = [
  'css/alertify.min.css',
    'css/themes/bootstrap.min.css'
];
public $js = [
    'alertify.min.js'
];
}
