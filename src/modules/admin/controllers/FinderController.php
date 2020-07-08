<?php

namespace ronashdkl\kodCms\modules\admin\controllers;

use alexantr\elfinder\CKEditorAction;
use alexantr\elfinder\ConnectorAction;
use alexantr\elfinder\InputFileAction;
use alexantr\elfinder\TinyMCEAction;
use Yii;
use yii\web\Controller;

class FinderController extends Controller
{
    public function actions()
    {
        return [
            'root' => [
                'class' => ConnectorAction::className(),
                'options' => [
                    'roots' => [
                        [
                            'driver' => 'LocalFileSystem',
                            'path' => Yii::getAlias('@app') . DIRECTORY_SEPARATOR .'storage',
                            'URL' => Yii::$app->request->baseUrl,
                            'mimeDetect' => 'internal',
                            'imgLib' => 'gd',
                            'accessControl' => function ($attr, $path) {
                                // hide files/folders which begins with dot
                                return (strpos(basename($path), '.') === 0) ?
                                    !($attr == 'read' || $attr == 'write') :
                                    null;
                            },
                        ],
                    ],
                ],
            ],
            'connector' => [
                'class' => ConnectorAction::className(),
                'options' => [
                    'roots' => [
                        [
                            'driver' => 'LocalFileSystem',
                            'path' => Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . 'web',
                            'URL' => Yii::$app->request->baseUrl."/web/",
                            'mimeDetect' => 'internal',
                            'imgLib' => 'gd',
                            'accessControl' => function ($attr, $path) {
                                // hide files/folders which begins with dot
                                return (strpos(basename($path), '.') === 0
                                    || strpos(basename($path), ['post','audio','css','js']) ===0
                                ) ?
                                    !($attr == 'read' || $attr == 'write') :
                                    null;
                            },
                        ],
                    ],
                ],
            ],
            'gallery' => [
                'class' => ConnectorAction::className(),
                'options' => [
                    'roots' => [
                        [
                            'driver' => 'LocalFileSystem',
                            'path' => Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . 'media/gallery',
                            'URL' => Yii::$app->request->baseUrl."/media/gallery/",
                            'mimeDetect' => 'internal',
                            'imgLib' => 'gd',
                            'accessControl' => function ($attr, $path) {
                                // hide files/folders which begins with dot
                                return (strpos(basename($path), '.') === 0
                                ) ?
                                    !($attr == 'read' || $attr == 'write') :
                                    null;
                            },
                        ],
                    ],
                ],
            ],

            'galleryInput' => [
                'class' => InputFileAction::className(),
                'connectorRoute' => 'gallery',
                'separator' => ',',
                'textareaSeparator' => '\n',
            ],
            'widget' => [
                'class' => InputFileAction::className(),
                'connectorRoute' => 'connector',
                'separator' => ',',
                'textareaSeparator' => '\n',
            ],
            'ckeditor' => [
                'class' => CKEditorAction::className(),
                'connectorRoute' => 'connector',
            ],
            'tinymce' => [
                'class' => TinyMCEAction::className(),
                'connectorRoute' => 'connector',
            ],

            //only for developer
            'developer' => [
                'class' => InputFileAction::className(),
                'connectorRoute' => 'root',
                'separator' => ',',
                'textareaSeparator' => '\n',
            ],
        ];
    }
}
