<?php


namespace ronashdkl\kodCms\models\client;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;
use yii\helpers\ArrayHelper;

class ClientModel extends BaseModel
{
    protected $loadFromDb = false;
    protected $isMultilanguage = false;
    public $listAttribute = 'list';
    public $listClass = ClientListModel::class;

    public $list;

    public function rules()
    {
        return [
            ['title','safe'],
            ['list', 'safe']
        ];
    }

    public function formTypes()
    {
        return [
            'title' => [
                // 'value' => $this->text,
                'type' => FieldConfig::INPUT,
            ],
        ];


    }
}
