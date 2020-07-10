<?php


namespace ronashdkl\kodCms\widgets;


use ronashdkl\kodCms\widgets\cookies\CookiesWidget;


use ronashdkl\kodCms\widgets\sections\about\AboutListSectionWidget;
use ronashdkl\kodCms\widgets\sections\clients\ClientsWidget;
use ronashdkl\kodCms\widgets\sections\details\PostDetailWidget;
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
            'topHeader' => null,
             HeaderWidget::navId() => null,
            'breadCrumb' =>null,
            AboutListSectionWidget::navId() => null,
            ClientsWidget::navId()=>null,
            ServiceWidget::navId()=>null,
            PostDetailWidget::navId()=>null,
            TestimonialWidget::navId()=>null,
            PriceWidget::navId()=>null,
            CookiesWidget::navId() => null,
            FooterWidget::navId()=>null
        ];
    }

    public  function getAll()
    {
        $list = [
            TopHeaderWidget::class,
            HeaderWidget::class,
            AboutListSectionWidget::class,
            ClientsWidget::class,
            ServiceWidget::class,
            PostDetailWidget::class,
            TestimonialWidget::class,
            PriceWidget::class,
            BreadCrumbWidget::class,
            FooterWidget::class,
            // CookiesWidget::class,
            SocialSectionWidget::class
        ];

        if(\Yii::$app->hooks->has_filter('block_list')) {
            $data = \Yii::$app->hooks->apply_filters('block_list', null);
            if(isset($data['override']) && $data['override']){
                $list= (isset($data['items']))?$data['items']:$list;
            }else{
                $list= array_merge($list, \Yii::$app->hooks->apply_filters('block_list', null));
            }
        }

        return $list;
    }


}
