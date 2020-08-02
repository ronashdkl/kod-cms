<?php


namespace ronashdkl\kodCms\widgets;


use ronashdkl\kodCms\widgets\cookies\CookiesWidget;


use ronashdkl\kodCms\widgets\sections\about\AboutListSectionWidget;
use ronashdkl\kodCms\widgets\sections\clients\ClientsWidget;
use ronashdkl\kodCms\widgets\sections\details\PostDetailWidget;
use ronashdkl\kodCms\widgets\sections\error\ErrorWidget;
use ronashdkl\kodCms\widgets\sections\footer\FooterWidget;
use ronashdkl\kodCms\widgets\sections\header\HeaderWidget;
use ronashdkl\kodCms\widgets\sections\price\PriceWidget;
use ronashdkl\kodCms\widgets\sections\service\ServiceWidget;
use ronashdkl\kodCms\widgets\sections\testimonial\TestimonialWidget;
use ronashdkl\kodCms\widgets\sections\top\TopHeaderWidget;
use yii\base\Component;
use yii\helpers\VarDumper;

class WidgetList extends Component
{
    public  function name()
    {
        return [
           // 'topHeader' => null,

           'breadCrumb' =>null,

          //  CookiesWidget::navId() => null,

        ];
    }

    public  function getAll()
    {
        $list = [

           BreadCrumbWidget::class,
            // CookiesWidget::class,
          //  SocialSectionWidget::class
        ];

        if(\Yii::$app->hooks->has_filter('block_list')) {
            $list = \Yii::$app->hooks->apply_filters('block_list', $list);
        }


        return $list;
    }


}
