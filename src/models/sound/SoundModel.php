<?php


namespace ronashdkl\kodCms\models\sound;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;

class SoundModel extends BaseModel
{
    protected $loadFromDb = true;
    protected $isMultilanguage = false;
    public $playMenuSound;
    public $playTruckHorn;
    public $playCalculatorSound;

    public function rules()
    {
        return [
            [['playMenuSound', 'playTruckHorn', 'playCalculatorSound'], 'safe']
        ];
    }

    public function formTypes()
    {
        return [
            'playMenuSound' => [
                'type' => FieldConfig::RADIO,
                'data' => [1 => 'Yes', 0 => 'No']
            ],
            'playTruckHorn' => [
                'type' => FieldConfig::RADIO,
                'data' => [1 => 'Yes', 0 => 'No']
            ], 'playCalculatorSound' => [
                'type' => FieldConfig::RADIO,
                'data' => [1 => 'Yes', 0 => 'No']
            ]
        ];
    }
}
