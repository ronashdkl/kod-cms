<?php
/**
 * Created by PhpStorm.
 * User: ronash
 * Date: 2019-06-12
 * Time: 20:01
 */

namespace ronashdkl\kodCms\models;


interface ListModelInterface
{
    public function formTypes();

    public function getNameOfClass();

    public  function actionColumn();
    public function displayAttributes();
    public  function getColumns();


}
