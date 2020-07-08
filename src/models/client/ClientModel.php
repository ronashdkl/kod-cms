<?php


namespace ronashdkl\kodCms\models\client;


use ronashdkl\kodCms\models\BaseModel;
use yii\helpers\ArrayHelper;

class ClientModel extends BaseModel
{
    protected $loadFromDb = true;
    protected $isMultilanguage = false;
    public $listAttribute = 'list';
    public $listClass = ClientListModel::class;

    public $list;

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [['list', 'safe']]);
    }
}
