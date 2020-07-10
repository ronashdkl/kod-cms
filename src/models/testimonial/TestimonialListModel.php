<?php


namespace ronashdkl\kodCms\models\testimonial;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\ListModel;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Class AboutListModel
 * @property string $text
 * @package ronashdkl\kodCms\models\service
 */
class TestimonialListModel extends ListModel
{

    public $name;
    public $avatar;
    public $message;

    public function rules()
    {

        return  [
            ['name','required'],
            ['avatar', 'string'],
            ['message', 'required']
        ];

    }

    public function formTypes()
    {
        return [
            'name' => [
                // 'value' => $this->text,
                'type' => FieldConfig::INPUT,
            ],
            'message' => [
                // 'value' => $this->text,
                'type' => FieldConfig::INPUT,
            ],
            'avatar' => [
                // 'value' => $this->text,
                'type' => FieldConfig::IMAGE,
            ],

        ];
    }

    public  function displayAttributes()
    {
        return  ['name'];
    }

    public function validate($attributeNames = null, $clearErrors = true)
    {
        return parent::validate($attributeNames, $clearErrors); // TODO: Change the autogenerated stub
    }
}
