<?php


namespace ronashdkl\kodCms\models\contact;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;

class ContactModel extends BaseModel
{
    public $code;
    public $list;
    public $listAttribute = 'list';
    public $listClass = Contact::class;
    public function rules()
    {
        return [
            [['code'],'required']
        ];
    }

    public function formTypes()
    {
        return [
            'code'=>[
                'type'=>FieldConfig::CODE,
            ]
        ];
    }

    public function init()
    {
        parent::init();
        $this->list = Contact::find()->all();
    }
}