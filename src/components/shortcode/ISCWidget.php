<?php


namespace ronashdkl\kodCms\components\shortcode;

/**
 * Interface ISCWidget
 * @package app\components
 * for shortcodes renderer
 */
interface ISCWidget
{
    public static function getCodeName();
    public static function getSummary();
    public static function widget();
}
