<?php

namespace ronashdkl\kodCms\modules\admin;


use ronash\cms\modules\admin\controllers\blocks\TestController;
use ronashdkl\kodCms\components\Plugins;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;


/**
 * admin module definition class
 */
final class Module extends \yii\base\Module
{
    const ADMIN_FEATURES = 'admin_features';
    public $defaultRoute ='post';
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'ronashdkl\kodCms\modules\admin\controllers';
    public $layout ='main.php';
    public $layoutPath = '@kodCms/modules/admin/views/layouts/';
    private $navigation;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin']
                    ]
                ]
            ]
        ];
    }




    public function getMenu()
    {
        $this->navigation['social'] = [
            ['label' => 'Facebook', 'icon' => 'facebook','url' => ['/admin/facebook/index']],
            ['label' => 'Instagram', 'icon' => 'linkedin','url' => ['/admin/instagram/index']],
            ['label' => 'SEO', 'icon' => 'globe','url' => ['/admin/seo/index']],
        ];
        if(\Yii::$app->hooks->has_filter('admin_menu_social')) {
            $this->navigation['social']  = \Yii::$app->hooks->apply_filters('admin_menu_social', $this->navigation['social']);
        }
        $this->navigation['blocks'] = [
            //  ['label' => 'Backup', 'icon' => 'folder','url' => ['/admin/backup']],
        ];

         if(\Yii::$app->hooks->has_filter('admin_menu_blocks')) {
               $this->navigation['blocks']  = \Yii::$app->hooks->apply_filters('admin_menu_blocks', $this->navigation['blocks']);
         }
        $this->navigation['menu'] = [
            [
                'label' => 'Dashboard',
                'icon' => 'home',
                'url' => ['/admin'],
            ],
            ['label' => 'Catalogs', 'icon' => 'folder', 'url' => ['/admin/catalog']],
            ['label' => 'Content', 'icon' => 'file', 'items' => [
                ['label' => 'All', 'url' => ['/admin/post/index']],
                ['label' => 'Draft', 'url' => ['/admin/post/draft']],
                ['label' => 'Trash', 'icon' => 'trash', 'url' => ['/admin/post/trash']],
            ]
            ],
            ['label'=>'Manage Plugins','icon' => 'plug','url' => ['/admin/plugin']],
            ['label'=>'Manage Blocks','icon' => 'list','url' => ['/admin/config/page']],
            ['label'=>'Short Codes','icon' => 'list','url' => ['/admin/short-code']],
            ['label' => 'Blocks', 'icon' => 'module', 'items' => $this->navigation['blocks']],
            ['label' => 'Social', 'icon' => 'globe', 'items' => $this->navigation['social']],
            ['label' => 'Translate', 'icon' => 'globe','url' => ['/translatemanager']],
            ['label' => 'Language', 'icon' => 'language','url' => ['/admin/language']],
        ];

        if(\Yii::$app->hooks->has_filter('admin_menu')) {
             $this->navigation['menu'] = \Yii::$app->hooks->apply_filters('admin_menu', $this->navigation['menu']);
        }


        return $this->navigation['menu'];
}


public function init()
{
    parent::init();
    if(\Yii::$app->hooks->has_filter('admin_controller')){
    $this->controllerMap = \Yii::$app->hooks->apply_filters('admin_controller',$this->controllerMap);
    \Yii::$app->params['bsVersion'] = '3';
}
}
}
