<?php


namespace ronashdkl\kodCms\models\price;


use ronashdkl\kodCms\models\BaseModel;
use yii\helpers\ArrayHelper;

class PriceModel extends BaseModel
{
public $isMultilanguage = false;
public $listClass = PriceListModel::class;
public $listAttribute  = 'list';
public $list;

public function rules()
{
    return ArrayHelper::merge(parent::rules(),[
        ['list','safe']
    ]);
}
}