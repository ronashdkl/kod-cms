<?php


namespace ronashdkl\kodCms\widgets\sections\testimonial;


use ronashdkl\kodCms\models\testimonial\TestimonialModel;
use ronashdkl\kodCms\widgets\sections\SectionWidget;

class TestimonialWidget extends SectionWidget
{

    public static function navId()
    {
        return "Testimonial";
    }
    public function run()
    {
        parent::run();
        return $this->render('index',['model'=>new TestimonialModel()]);
    }
}