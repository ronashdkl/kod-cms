<?php


namespace ronashdkl\kodCms\models\contact;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;

class MapModel extends BaseModel
{

    public $code;
    protected $isMultilanguage=false;

    public function rules()
    {
        return[
            ['code','required']
        ];
    }

    public function formTypes()
    {
        return[
            'code'=>[
                'type'=>FieldConfig::CODE
            ]
        ];
    }

}