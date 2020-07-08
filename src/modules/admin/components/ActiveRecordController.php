<?php


namespace ronashdkl\kodCms\modules\admin\components;


use ronashdkl\kodCms\modules\admin\exceptions\PropertyException;
use yii\web\Controller;

class ActiveRecordController extends Controller
{
protected $searchModelClass;
protected $modelClass;


public function init()
{
    parent::init();
    if($this->searchModelClass == null && $this->modelClass==null){
        throw new PropertyException('SearchModelClass or ModelClass is not defined');
    }
}
}
