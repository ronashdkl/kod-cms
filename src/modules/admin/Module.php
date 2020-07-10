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
        $this->navigation['blocks'] = [
            ['label' => 'Menu', 'url' => ['/admin/config/menu']],
            ['label' => 'Header', 'url' => ['/admin/blocks/header']],
            ['label' => 'Clients', 'url' => ['/admin/blocks/clients']],
            ['label' => 'Services', 'url' => ['/admin/blocks/services']],
            ['label' => 'About', 'url' => ['/admin/about/index']],
            ['label' => 'Detail Box', 'url' => ['/admin/blocks/detail-box']],
            ['label' => 'Testimonial', 'url' => ['/admin/blocks/testimonial']],
            ['label' => 'Price', 'url' => ['/admin/blocks/price']],
            ['label' => 'Language', 'icon' => 'globe','url' => ['/admin/language']],
            ['label' => 'Pris Text', 'url' => ['/admin/config/pris-form']],
            // ['label' => 'Contact', 'icon' => 'phone','url' => ['/admin/contact']],
            ['label' => 'Audio', 'icon' => 'headphone','url' => ['/admin/audio']],
            //  ['label' => 'Backup', 'icon' => 'folder','url' => ['/admin/backup']],
        ];

         if(\Yii::$app->hooks->has_filter('admin_menu_blocks')) {
               $data  = \Yii::$app->hooks->apply_filters('admin_menu_blocks', null);
               if(isset($data['override']) && $data['override']){
                   $this->navigation['blocks'] = (isset($data['items']))?$data['items']:$this->navigation['blocks'];
               }else{
                   $this->navigation['blocks'] = array_merge($this->navigation['blocks'], \Yii::$app->hooks->apply_filters('admin_menu_blocks', null));
               }
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
            ]],
            ['label'=>'Manage Plugins','url' => ['/admin/plugin']],
            ['label'=>'Manage Blocks','url' => ['/admin/config/page']],
            ['label' => 'Blocks', 'icon' => 'cog', 'items' => $this->navigation['blocks']],
            ['label' => 'Social', 'icon' => 'globe', 'items' => $this->navigation['social']],
            ['label' => 'Translate', 'icon' => 'globe','url' => ['/translatemanager']],
            ['label' => 'Inquery', 'icon' => 'globe','url' => ['/admin/inquery']]


        ];

        if(\Yii::$app->hooks->has_filter('admin_menu')) {
            $data = \Yii::$app->hooks->apply_filters('admin_menu', null);
            if(isset($data['override']) && $data['override']){
                $this->navigation['menu'] = (isset($data['items']))?$data['items']:$this->navigation['menu'];
            }else{
                $this->navigation['menu'] = array_merge($this->navigation['menu'], \Yii::$app->hooks->apply_filters('admin_menu', null));
            }
        }


        return $this->navigation['menu'];
}


public function init()
{
    parent::init();
    if(\Yii::$app->hooks->has_filter('admin_controller')){
    $this->controllerMap =  array_merge($this->controllerMap,\Yii::$app->hooks->apply_filters('admin_controller',null));
}
}
}
