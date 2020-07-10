<?php


namespace ronashdkl\kodCms\widgets\sections\clients;


use ronashdkl\kodCms\models\client\ClientModel;
use ronashdkl\kodCms\widgets\sections\SectionWidget;

class ClientsWidget extends SectionWidget
{
public $model;
    public static function navId()
    {
        return "clients";
    }



    public function run()
    {

        parent::run();
        return $this->render('clients',['model'=>new ClientModel()]);
    }
}