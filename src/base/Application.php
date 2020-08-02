<?php

/**
 * @var \ronashdkl\kodCms\components\Plugins $plugins
 */

namespace ronashdkl\kodCms\base;


use ronashdkl\kodCms\components\Hooks;

use ronashdkl\kodCms\components\Plugins;
use ronashdkl\kodCms\widgets\WidgetList;
use Yii;
use yii\base\InvalidConfigException;

use yii\i18n\I18N;

final class Application extends \yii\web\Application
{
    public $controllerNamespace = 'ronashdkl\\kodCms\\controllers';
    public $version = '1.0.0';
    public $projectId;
    public $hooks;
    public $plugins;
    public $widgetListClass;
    public $widgetList;
    public $pluginPath = '@app/plugins';

    public function init()
    {
        $this->hooks = new Hooks();
        Yii::setAlias('@kodCms', dirname(__DIR__) . "/");
        Yii::setAlias('@kodCmsWeb', dirname(__DIR__) . "/../web/");
        $this->widgetList = $this->widgetListClass ? new $this->widgetListClass() : new WidgetList();
        $this->plugins = new Plugins();
        parent::init();

    }

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

        if (!isset($config['modules']['admin'])) {
            $config['modules']['admin'] = ['class' => 'ronashdkl\kodCms\modules\admin\Module',
                'layout' => '@kodCms/modules/admin/views/layouts/main.php',];
        }
        if (!isset($config['modules']['noty'])) {
            $config['modules']['noty'] = ['class' => 'lo\modules\noty\Module',];

        }
        if (!isset($config['modules']['treemanager'])) {
            $config['modules']['treemanager'] =  [
                'class' => '\kartik\tree\Module',
            ];
        }
        if (!isset($config['modules']['rbac'])) {
            $config['modules']['rbac']= ['class' => 'dektrium\rbac\RbacWebModule',
                'layout' => '@kodCms/modules/admin/views/layouts/main.php',
            ];
        }
        if (!isset($config['modules']['gridview'])) {
            $config['modules']['gridview']=['class' => '\kartik\grid\Module',
            ];
        }
        if (!isset($config['modules']['translatemanager'])) {
            $config['modules']['translatemanager'] = [
                'class' => 'lajax\translatemanager\Module',
                'layout' => '@kodCms/modules/admin/views/layouts/main.php',
                'roles' => ['admin'],
                'tmpDir' => '@runtime',
                'allowedIPs' => ['*'],
                'root' => '@app',
            ];
        }
        if (!isset($config['modules']['api'])) {
            $config['modules']['api']=[
                'class' => 'ronashdkl\kodCms\modules\api\Module',
            ];
        }

        if (!isset($config['modules']['user'])) {
            $config['modules']['user']= [
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
            ];
        }

        if (isset($config['bootstrap'])) {
            $config['bootstrap'] = array_merge($config['bootstrap'], [
                'log', 'admin', 'assetsAutoCompress'
            ]);
        } else {
            $config['bootstrap'] = [
                'log', 'admin', 'assetsAutoCompress'
            ];
        }


        if (!isset($config['components']['view']['theme']['pathMap'])) {
            $config['components']['view']['theme']['pathMap'] = ViewParams::getPathMap();
        } else {
            $config['components']['view']['theme']['pathMap'] = array_merge(ViewParams::getPathMap(), $config['components']['view']['theme']['pathMap']);
        }
        if (!isset($config['components']['view']['params'])) {
            $config['components']['view']['params'] = ViewParams::getParams();
        } else {
            $config['components']['view']['params'] = array_merge(ViewParams::getParams(), $config['components']['view']['params']);
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
                    'class' => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
                    'enabled' => false,//  (YII_APP_ID==1)?true:false,
                    'htmlFormatter' => [
                        //Enable compression html
                        'class' => 'skeeks\yii2\assetsAuto\formatters\html\TylerHtmlCompressor',
                        'extra' => false,       //use more compact algorithm
                        'noComments' => true,        //cut all the html comments
                        'maxNumberRows' => 50000,       //The maximum number of rows that the formatter runs on

                    ],
                ],
            'geoip' => ['class' => 'lysenkobv\GeoIP\GeoIP'],
            'reCaptcha' => [
                'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
            ],
            'urlManager' => [
                'class' => 'codemix\localeurls\UrlManager',
                //'class' => \yii\web\UrlManager::class,
                'enableDefaultLanguageUrlCode' => true,
                // List all supported languages here
                // Make sure, you include your app's default language.
                'languages' => ['en'],
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                'rules' => UrlRules::getRules(),
                'ignoreLanguageUrlPatterns' => UrlRules::getIgnoreRules()
            ],
            'i18n' => [
                'class' => I18N::class,
                'translations' => [
                    'conquer/oauth2' => [
                        'class' => \yii\i18n\PhpMessageSource::class,
                        'basePath' => '@conquer/oauth2/messages',
                    ],
                    '*' => [
                        'class' => 'yii\i18n\DbMessageSource',
                        'db' => 'db',
                        'sourceLanguage' => 'en',
                        'sourceMessageTable' => '{{%language_source}}',
                        'messageTable' => '{{%language_translate}}',
                        'cachingDuration' => 86400,
                        'enableCaching' => false,

                    ],
                ],
            ],
        ]);
    }


}
