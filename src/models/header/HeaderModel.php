<?php


namespace ronashdkl\kodCms\models\header;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * Class AboutModel
 * @property string $summary
 * @property string $title
 * @package ronashdkl\kodCms\models\service
 */
class HeaderModel extends BaseModel
{
    protected $loadFromDb = false;
    public $summary;
    public $title;
    public $image;
    public $button_text;
    public $button_link;




    public function rules()
    {

        return ArrayHelper::merge(parent::rules(), [

            [['image','button_text','button_link'], 'string'],

        ]);

    }

    public function formTypes()
    {
        return ArrayHelper::merge(parent::formTypes(),
            [
                'button_text' => [
                    // 'value' => $this->display,
                    'type' => FieldConfig::INPUT,
                ],
                'button_link' => [
                    // 'value' => $this->display,
                    'type' => FieldConfig::INPUT,
                ],
                'image' => [
                    // 'value' => $this->display,
                    'type' => FieldConfig::IMAGE,
                ],


            ]
        );

    }


}
