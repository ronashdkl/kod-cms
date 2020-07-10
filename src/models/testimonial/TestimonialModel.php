<?php


namespace ronashdkl\kodCms\models\testimonial;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\config\AppData;
use ronashdkl\kodCms\models\BaseModel;
use ronashdkl\kodCms\models\post\PostModel;
use yii\helpers\ArrayHelper;

class TestimonialModel extends BaseModel
{
    public $listClass = TestimonialListModel::class;
    public $isMultilanguage = false;
    public $loadFromDb = false;
    public $image;
    public $title;
    public $listAttribute = 'list';
    public $list;

    public function rules()
    {
        return  [
            ['image', 'string'],
            ['list','safe'],
            ['title','string']
        ];
    }

    public function formTypes()
    {
        return [
            'image' => [
                'type' => FieldConfig::IMAGE
            ],
            'title' => [
                'type' => FieldConfig::INPUT
            ]
        ];
    }

}
