<?php

namespace ronashdkl\kodCms\modules\admin;


use yii\filters\AccessControl;


/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    const ADMIN_FEATURES = 'admin_features';
    public $defaultRoute ='post';
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'ronashdkl\kodCms\modules\admin\controllers';

    public static $menu = [
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
        ['label'=>'Manage Blocks','url' => ['/admin/config/page']],
        ['label' => 'Structure', 'icon' => 'cog', 'items' => [
            ['label' => 'Menu', 'url' => ['/admin/config/menu']],
            ['label' => 'About', 'url' => ['/admin/about/index']],
            ['label' => 'Language', 'icon' => 'globe','url' => ['/admin/language']],
            ['label' => 'Pris Text', 'url' => ['/admin/config/pris-form']],
           // ['label' => 'Contact', 'icon' => 'phone','url' => ['/admin/contact']],
            ['label' => 'Audio', 'icon' => 'headphone','url' => ['/admin/audio']],
          //  ['label' => 'Backup', 'icon' => 'folder','url' => ['/admin/backup']],
        ]],
        ['label' => 'Social', 'icon' => 'globe', 'items' => [
            ['label' => 'Facebook', 'icon' => 'facebook','url' => ['/admin/facebook/index']],
            ['label' => 'Instagram', 'icon' => 'linkedin','url' => ['/admin/instagram/index']],
            ['label' => 'SEO', 'icon' => 'globe','url' => ['/admin/seo/index']],
        ]],
        ['label' => 'Translate', 'icon' => 'globe','url' => ['/translatemanager']],
        ['label' => 'Inquery', 'icon' => 'globe','url' => ['/admin/inquery']]


    ];


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
        return self::$menu;
}
}
