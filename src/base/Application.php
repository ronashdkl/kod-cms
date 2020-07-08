<?php


namespace ronashdkl\kodCms\base;


use lo\plugins\components\PluginsManager;
use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class Application extends \yii\web\Application
{
    public $controllerNamespace = 'ronashdkl\\kodCms\\controllers';
    public $version = '1.0.0';
    /**
     * Pre-initializes the application.
     * This method is called at the beginning of the application constructor.
     * It initializes several important application properties.
     * If you override this method, please make sure you call the parent implementation.
     * @param array $config the application configuration
     * @throws InvalidConfigException if either [[id]] or [[basePath]] configuration is missing.
     */
    public function preInit(&$config)
    {
        parent::preInit($config);
        Yii::setAlias('@kodCms', dirname(__DIR__)."/");
        if (!isset($config['modules']['admin'])) {
            $this->setModule('admin',[
                'class' => 'ronashdkl\kodCms\modules\admin\Module',
                'layout' => '@kodCms/modules/admin/views/layouts/main.php',
            ]);
        }

        if (!isset($config['modules']['plugins'])) {
            $this->setModule('plugins',[
                'class' => 'lo\plugins\Module',
                'layout' => '@kodCms/modules/admin/views/layouts/main.php',
                'pluginsDir' => [
                    '@kodCms/plugins', // default dir with core plugins
                    '@kodCms/shortcodes',
                    '@app/plugins', // dir with our plugins
                    '@app/shortcodes', // dir with our plugins
                ]
            ]);
        }
        if (!isset($config['modules']['noty'])) {
            $this->setModule('noty',[
                'class' => 'lo\modules\noty\Module',
            ]);
        }
        if (!isset($config['modules']['treemanager'])) {
            $this->setModule('treemanager',[
                'class' => '\kartik\tree\Module',
            ]);
        }
        if (!isset($config['modules']['rbac'])) {
            $this->setModule('rbac', ['class' => 'dektrium\rbac\RbacWebModule',
                'layout' => '@kodCms/modules/admin/views/layouts/main.php',
            ]);
        }
        if (!isset($config['modules']['gridview'])) {
            $this->setModule('gridview', ['class' => '\kartik\grid\Module',
            ]);
        }
        if (!isset($config['modules']['translatemanager'])) {
            $this->setModule('translatemanager',  [
                'class' => 'lajax\translatemanager\Module',
                'layout' => '@kodCms/modules/admin/views/layouts/main.php',
                'roles' => ['admin'],
                'tmpDir' => '@runtime',
                'allowedIPs' => ['*'],
                'root' => '@app',
            ]);
        }
        if (!isset($config['modules']['api'])) {
            $this->setModule('api', [
                'class' => 'ronashdkl\kodCms\modules\api\Module',
            ]);
        }

        if (!isset($config['modules']['user'])) {
            $this->setModule('user',[
                'class' => 'dektrium\user\Module',
                'layout' => '@kodCms/modules/admin/views/layouts/main.php',
                'enableUnconfirmedLogin' => true,
                'confirmWithin' => 21600,
                'cost' => 12,
                'admins' => ['ronash', 'admin'],
                'controllerMap' => [
                    'profile' => [
                        'class' => 'dektrium\user\controllers\ProfileController',
                        'layout' => '@kodCms/views/layouts/main.php'
                    ],
                    'security' => [
                        'class' => 'dektrium\user\controllers\SecurityController',
                        'layout' => '@kodCms/views/layouts/main.php'
                    ],
                    'registration' => [
                        'class' => 'dektrium\user\controllers\RegistrationController',
                        'layout' => '@kodCms/views/layouts/main.php'
                    ],
                    'recovery' => [
                        'class' => 'dektrium\user\controllers\RecoveryController',
                        'layout' => '@kodCms/views/layouts/main.php'

                    ],
                ],
                'modelMap' => [
                    'Profile' => 'ronashdkl\kodCms\modules\admin\models\Profile',
                ],
            ]);
        }

        if(isset($config['bootstrap'])){
            $config['bootstrap'] = array_merge($config['bootstrap'],[
                'log', 'plugins','assetsAutoCompress'
            ]);
        }else{
            $config['bootstrap'] = [
                'log', 'plugins','assetsAutoCompress'
            ];
        }
    }


    /**
     * {@inheritdoc}
     */
    public function coreComponents()
    {
        return array_merge(parent::coreComponents(), [
            'appData' => ['class' => 'ronashdkl\kodCms\config\AppData',],
            'configJson' => [
                'class' => 'creocoder\flysystem\LocalFilesystem',
                'path' => '@app/config/json/',
            ],
            'modelJson' => [
                'class' => 'creocoder\flysystem\LocalFilesystem',
                'path' => '@app/storage/data',
            ],
            'plugins' => [
                'class' => PluginsManager::class,
                'appId' => YII_APP_ID,
                // by default
                'enablePlugins' => true,
                'shortcodesParse' => true,
                'shortcodesIgnoreBlocks' => [
                    '<pre[^>]*>' => '<\/pre>',
                    '<div class="content[^>]*>' => '<\/div>',
                ]],
            'assetManager' => [
              'class' => 'yii\web\AssetManager',
                'bundles' => [
                    'yidas\adminlte\AdminlteAsset' => [
                        'skin' => 'skin-black',
                    ],
                ],
            ],
            'user' => ['class' => 'yii\web\User',
                'identityClass' => \ronashdkl\kodCms\modules\admin\models\User::class
            ],
            'log' => [
                'class' => 'yii\log\Dispatcher',
                'traceLevel' => YII_DEBUG ? 3 : 0,
                'targets' => [
                    [
                        'class' => 'yii\log\FileTarget',
                        'logFile' => '@runtime/logs/kodstack.log',
                        'levels' => ['error', 'warning', 'info'],
                        'categories' => [
                            'app',
                            'site'
                        ],
                        'except' => [
                            'yii\web\HttpException:404'
                        ],
                    ]
                ]
            ],
            'assetsAutoCompress' =>
                [
                    'class'         => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
                    'enabled' => false,//  (YII_APP_ID==1)?true:false,
                    'htmlFormatter' => [
                        //Enable compression html
                        'class'         => 'skeeks\yii2\assetsAuto\formatters\html\TylerHtmlCompressor',
                        'extra'         => false,       //use more compact algorithm
                        'noComments'    => true,        //cut all the html comments
                        'maxNumberRows' => 50000,       //The maximum number of rows that the formatter runs on

                    ],
                ],
            'geoip' => ['class' => 'lysenkobv\GeoIP\GeoIP'],
            'reCaptcha' => [
                'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
            ],
            'view' => [
                'class' => \yii\web\View::class,
                'theme' => [
                    'pathMap' => [
                        '@vendor/dektrium/user/views' => '@kodCms/views/user',
                        '@vendor/loveorigami/yii2-plugins-system/src/views' => '@kodCms/modules/admin/views/plugins',
                        '@vendor/kartik/tree/views' => '@kodCms/modules/admin/views/tree'
                    ],
                ],
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {

        parent::init();

    }
}