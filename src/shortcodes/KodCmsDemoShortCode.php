<?php


namespace ronashdkl\kodCms\shortcodes;


use ronashdkl\kodCms\components\shortcode\ISCWidget;

class KodCmsDemoShortCode implements ISCWidget
{

    public static function getCodeName()
    {
        return "{{kodCms_demo}}";
    }

    public static function widget()
    {
       return "KODCMS Powered by kodknackare";
    }

    public static function getSummary()
    {
        return "Display demo data";
    }
}
