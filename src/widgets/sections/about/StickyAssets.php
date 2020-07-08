<?php


namespace ronashdkl\kodCms\widgets\sections\about;


use yii\web\AssetBundle;

class StickyAssets extends AssetBundle
{
public $sourcePath = '@vendor/bower-asset/sticky-sidebar/dist/';
public $js = ['sticky-sidebar.min.js'];
public $depends=[
    ResizeSensorAsset::class
];

}