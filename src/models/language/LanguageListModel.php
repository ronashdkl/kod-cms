<?php


namespace ronashdkl\kodCms\models\language;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\ListModel;

class LanguageListModel extends ListModel
{
    public $code;
    public $language_id;
    public $name;
    public $flag;

    public function rules()
    {
        return [[['name', 'code', 'flag'], 'required'], ['language_id', 'safe']];
    }

    public function formTypes()
    {
        return [
            'name' => [
                'type' => FieldConfig::INPUT
            ],
            'code' => [
                'type' => FieldConfig::INPUT
            ],
            'language_id' => [
                'type' => FieldConfig::INPUT
            ],
            'flag' => [
                'type' => FieldConfig::IMAGE
            ]
        ];
    }

    public function displayAttributes()
    {
        return [
            'name', 'code', 'language_id'
        ];
    }
}