<?php


namespace ronashdkl\kodCms\models\menu;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\StyleModel;

/**
 * Class AboutStyleModel
 * @property string $background
 * @property string $color
 * @package ronashdkl\kodCms\models\service
 */
class MenuStyleModel extends StyleModel
{
    public $sub_menu;

    public function rules()
    {
        return [

            [['sub_menu'], 'string'],

        ];
    }

    public function formTypes()
    {
        return [
            'sub_menu' => [
                'type' => FieldConfig::RADIO,
                'data'=>['submenu-light'=>'light','submenu-dark'=>'dark']
            ]
        ];
    }
}
