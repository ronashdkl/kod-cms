<?php


namespace ronashdkl\kodCms\models;


use ronashdkl\kodCms\components\FieldConfig;
use yii\base\Model;

/**
 * Class StyleModel
 * @property string $background
 * @property string $color
 * @package ronashdkl\kodCms\models\service
 */
abstract class StyleModel extends Model
{
    public $background;
    public $color;

    public function rules()
    {
        return [

            [['background', 'color'], 'string'],

        ];
    }

    public function formTypes()
    {
        return [
            'background' => [
                // 'value' => $this->text,
                'type' => FieldConfig::COLOR,
            ],
            'color' => [
                // 'value' => $this->text,
                'type' => FieldConfig::COLOR,
            ]
        ];
    }
}