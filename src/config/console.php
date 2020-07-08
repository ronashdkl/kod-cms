<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'ronash\\cms\\commands',
    'vendorPath'=>dirname(__DIR__)."/../vendor",
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
        '@ronash'=>dirname(__DIR__)."/"
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
        ],
       'rbac' => 'dektrium\rbac\RbacConsoleModule',
        'translatemanager' => [
            'class' => 'lajax\translatemanager\Module',
            'scanTimeLimit' => 10000,
            'root' => '@app',               // The root directory of the project scan.
            'allowedIPs' => ['*'],  // IP addresses from which the translation interface is accessible.
                       // For setting access levels to the translating interface.
            'tmpDir' => '@runtime',         // Writable directory for the client-side temporary language files.
            // IMPORTANT: must be identical for all applications (the AssetsManager serves the JavaScript files containing language elements from this directory).
            'phpTranslators' => ['::t'],    // list of the php function for translating messages.
            'jsTranslators' => ['lajax.t'], // list of the js function for translating messages.
            'patterns' => ['*.js', '*.php'],// list of file extensions that contain language elements.
            'ignoredCategories' => ['yii'], // these categories won’t be included in the language database.
            'ignoredItems' => ['config'],   // these files will not be processed.
            'tables' => [                   // Properties of individual tables
                [
                    'connection' => 'db',   // connection identifier
                    'table' => '{{%language}}',          // table name
                    'columns' => ['name', 'name_ascii']  //names of multilingual fields
                ]
            ]
        ],

    ],
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationNamespaces' => [
                'lo\plugins\migrations',
                'conquer\oauth2\migrations',
            ],
        ],
        'translate' => [
            'class'=>'\lajax\translatemanager\commands\TranslatemanagerController']
    ],
    'components' => [
        'geoip' => ['class' => 'lysenkobv\GeoIP\GeoIP'],
        'i18n' => [
            'translations' => [
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
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
