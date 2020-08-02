<?php
namespace ronashdkl\kodCms\base;
use ronashdkl\kodCms\models\site\SiteModel;
use Yii;
class ViewParams {
    static function getParams(){
        return [
            'config' => function ($path = null) {
                $site = Yii::$app->appData->siteData??SiteModel::getInstance();
                if ($path == null) {
                    return $site;
                }
                if ($site->hasProperty($path)) {
                    return $site->{$path};

                } else {
                    throw new \ronashdkl\kodCms\modules\admin\exceptions\PropertyException($path . " is not property of " . $site->nameOfClass);
                }
            },

        ];
    }
    static function getPathMap(){
        return  [
            '@kodCms/views'=>[
                '@app/views',
                '@kodCms/views'
            ],
            '@app/modules/admin/views'=>'@kodCms/modules/admin/views',
            '@dektrium/user/views' => '@kodCms/views/user',
             '@vendor/kartik/tree/views' => '@kodCms/modules/admin/views/tree'
        ];
    }
}
