<?php
namespace ronashdkl\kodCms\base;
use ronashdkl\kodCms\config\AppData;
use ronashdkl\kodCms\modules\admin\models\Post;
use Yii;
class ViewParams {
    static function getParams(){
        return [
            'page' => null,
            'pages' => function () {
                return Post::find()->select('title, slug')->where(['tree_id' => AppData::PAGE])->published()->asArray()->all();
            },
            'header_type' => 'header',
            'config' => function ($path = null) {
                $site = Yii::$app->appData->siteData;
                if ($path == null) {
                    return $site;
                }
                if ($site->hasProperty($path)) {
                    return $site->{$path};

                } else {
                    throw new \ronashdkl\kodCms\modules\admin\exceptions\PropertyException($path . " is not property of " . $site->nameOfClass);
                }
            },
            'social' => function ($social) {
                if ($social == 'facebook') {
                    return Yii::$app->appData->facebook;

                } elseif ($social == 'linkedin') {
                    return Yii::$app->appData->linkedin;
                } elseif ($social == 'instagram') {
                    return Yii::$app->appData->instagram;
                }
            },
            'seo' => function ($attribute) {
                if (YII_APP_ID == 2) {
                    return null;
                }
                $seo = Yii::$app->appData->seo;
                if ($seo->hasProperty($attribute)) {
                    return $seo->{$attribute};
                } else {
                    throw new \ronashdkl\kodCms\modules\admin\exceptions\PropertyException($attribute . " is not property of " . $seo->nameOfClass);
                }

            }
        ];
    }
    static function getPathMap(){
        return  [
            '@app/views'=>[
                '@app/views',
                '@kodCms/views'
            ],
            '@app/modules/admin/views'=>'@kodCms/modules/admin/views',
            '@vendor/dektrium/user/views' => '@kodCms/views/user',
            '@vendor/loveorigami/yii2-plugins-system/src/views' => '@kodCms/modules/admin/views/plugins',
            '@vendor/kartik/tree/views' => '@kodCms/modules/admin/views/tree'
        ];
    }
}