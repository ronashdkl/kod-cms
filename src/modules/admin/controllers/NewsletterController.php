<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\modules\admin\components\CRUDController;
use ronashdkl\kodCms\modules\admin\models\GallerySearch;
use ronashdkl\kodCms\modules\admin\models\Newsletter;
use ronashdkl\kodCms\modules\admin\models\NewsletterSearch;

class NewsletterController extends CRUDController
{
protected $modelClass = Newsletter::class;
protected $searchModelClass = NewsletterSearch::class;
}