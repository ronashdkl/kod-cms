<?php


namespace ronashdkl\kodCms\models\notice;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\StyleModel;
use yii\helpers\ArrayHelper;

class NoticeStyleModel extends StyleModel
{
    public $vertical_position;
    public $vertical_position_size;
    public $width;
    public $height;
    public $horizontal_position;
    public $horizontal_position_size;

    public function rules()
    {
        return [
            [['vertical_position', 'vertical_position_size', 'horizontal_position', 'horizontal_position_size', 'width', 'height'], 'required']
        ];
    }



    public function formTypes()
    {
        return [
            'width' => [
                'type' => FieldConfig::INPUT,
                'hint'=>'Bell Width'
            ],
            'height' => [
                'type' => FieldConfig::INPUT,
                'hint'=>'Bell Height'
            ],
            'vertical_position' => [
                'type' => FieldConfig::SELECT,
                'config' => ['data' => ['top' => 'Top', 'bottom' => 'Bottom']]
            ],
            'vertical_position_size' => [
                'type' => FieldConfig::INPUT,
            ],
            'horizontal_position' => [
                'type' => FieldConfig::SELECT,
                'config' => ['data' => ['left' => 'Left', 'right' => 'Right']]
            ],
            'horizontal_position_size' => [
                'type' => FieldConfig::INPUT,

            ],

        ];
    }
}