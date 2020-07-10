<?php


namespace ronashdkl\kodCms\modules\admin\controllers\blocks;

use ronashdkl\kodCms\models\testimonial\TestimonialModel;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;

/**
 * Class AboutController
 * @package ronashdkl\kodCms\modules\admin\controllers
 */
class TestimonialController extends AdminSiteController
{
    public $modelClass = TestimonialModel::class;


}
