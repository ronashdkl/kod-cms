<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace ronashdkl\kodCms\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
       'web/css/bootstrap.min.css',
        'web/css/animate.css',
        'web/css/font-awesome.min.css',
        'web/css/hover-min.css',
        'web/css/responsive.css',
        'web/css/themify-icons.css',
        'web/css/custom_design.css',
        'web/css/responsive.css',
    ];

    public $js = [
        'web/js/tooltip.js',
        'web/js/popper.js',
       'web/js/bootstrap.min.js',
        'web/js/wow.min.js',
        'web/js/calculator.js',
        //'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.sw.min.js',
        'web/js/custom.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
