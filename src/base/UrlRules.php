<?php
namespace ronashdkl\kodCms\base;
class UrlRules{
    static function getRules(){
        return [
            'page/<slug>' => 'page/index',
        ];
    }

    static function getIgnoreRules(){
        return [
            // route pattern => url pattern
                    '#^translatemanager/#' => '#^translatemanager/#',
                    '#^oauth2/#' => '#^oauth2/#',
                    '#^web-api/#' => '#^web-api/#',
                    '#^media/#' => '#^media/#',
                    '#^api/#' => '#^api/#',
                    '#^auth/#' => '#^auth/#',
                    '#^user/#' => '#^user/#',
                    '#^admin/log/#' => '#^admin/log/#',
                    '#^admin/api/#' => '#^admin/api/#',
                    '#^contact/send#' => '#^contact/send#',
            ];
    }
}