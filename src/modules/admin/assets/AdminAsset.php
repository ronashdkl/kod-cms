<?php
namespace ronashdkl\kodCms\modules\admin\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class AdminAsset extends AssetBundle
{
   public $sourcePath= '@kodCms/modules/admin/clients/';
    //public $basePathPath= '@webroot/';
    public $baseUrl = '@web';
    public $css = [
       // 'css/site.css'
    ];
    public $js = [
        'js/product.js'
    ];
    public $depends = [
   JqueryAsset::class
    ];
    public $publishOptions = [
        'forceCopy'=>true
    ];


}

