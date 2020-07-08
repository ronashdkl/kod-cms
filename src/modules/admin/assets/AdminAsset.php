<?php
namespace ronashdkl\kodCms\modules\admin\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
   // public $sourcePath= '@app/modules/admin/clients/';
    public $basePathPath= '@webroot/';
    public $baseUrl = '@web';

    public $css = [
        'css/site.css'
    ];
    public $js = [
        'js/product.js'
    ];
    public $depends = [
    'yidas\adminlte\AdminlteAsset'
    ];

}

