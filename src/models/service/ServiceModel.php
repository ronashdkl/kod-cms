<?php


namespace ronashdkl\kodCms\models\service;


use ronashdkl\kodCms\models\BaseModel;
use yii\helpers\ArrayHelper;

class ServiceModel extends BaseModel
{
    protected $loadFromDb = true;
    protected $isMultilanguage = true;
    public $listAttribute = 'list';
    public $listClass = ServiceListModel::class;

    public $list;

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [['list', 'safe']]);
    }
}
