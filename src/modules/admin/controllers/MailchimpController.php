<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\models\mailchimp\MailChimpModel;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;

class MailchimpController extends AdminSiteController
{
public $modelClass = MailChimpModel::class;
}
