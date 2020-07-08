<?php


namespace ronashdkl\kodCms\widgets;


use ronashdkl\kodCms\widgets\cookies\CookiesWidget;


use ronashdkl\kodCms\widgets\sections\about\AboutListSectionWidget;
use ronashdkl\kodCms\widgets\sections\footer\FooterWidget;
use ronashdkl\kodCms\widgets\sections\header\HeaderWidget;
use ronashdkl\kodCms\widgets\sections\hero\HeroWidget;
use ronashdkl\kodCms\widgets\sections\top\TopHeaderWidget;

class WidgetList
{
    public static function name()
    {
        return [
            'topHeader' => null,
            'Header' => null,
            'breadCrumb' =>null,
            AboutListSectionWidget::navId() => null,
            CookiesWidget::navId() => null,
            FooterWidget::navId()=>null
        ];
    }

    public static function getAll()
    {
        return [
            TopHeaderWidget::class,
            HeaderWidget::class,
            CubicCounterCircleWidget::class,
            HeroWidget::class,
            BreadCrumbWidget::class,
            AboutListSectionWidget::class,
            FooterWidget::class,
           // CookiesWidget::class,
            SocialSectionWidget::class
        ];
    }


}
