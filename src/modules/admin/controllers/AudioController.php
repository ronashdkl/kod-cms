<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\models\about\AboutModel;

use ronashdkl\kodCms\models\sound\SoundModel;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;

/**
 * Class AboutController
 * @package ronashdkl\kodCms\modules\admin\controllers
 */
class AudioController extends AdminSiteController
{
    public $modelClass = SoundModel::class;


}
