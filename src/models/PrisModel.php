<?php


namespace ronashdkl\kodCms\models;


use ronashdkl\kodCms\components\FieldConfig;

class PrisModel extends BaseModel
{
    protected $loadFromDb = true;
    public $body;
    public $isMultilanguage = false;

    public function rules()
    {

        return [

            [['body'], 'string'],

        ];
    }

    public function formTypes()
    {
        return
            [
                'body' => [
                    // 'value' => $this->display,
                    'type' => FieldConfig::CKEDITOR,
                ],

            ];


    }
}
