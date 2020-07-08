<?php


namespace ronashdkl\kodCms\models\testimonial;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\config\AppData;
use ronashdkl\kodCms\models\BaseModel;
use ronashdkl\kodCms\models\post\PostModel;
use yii\helpers\ArrayHelper;

class TestimonialModel extends BaseModel
{
    public $isMultilanguage = true;
    public $loadFromDb = true;
    public $background;

    public function rules()
    {
        return  [
            ['background', 'string']
        ];
    }

    public function formTypes()
    {
        return [
            'background' => [
                'type' => FieldConfig::IMAGE
            ]
        ];
    }
    public function getBackground()
    {
        if($this->background==null){
            return  $this->background = '/web/images/pattern/pattern3.png';
        }else{
            return $this->background;
        }
    }
    public function getlist(){
        return PostModel::find()->where(['tree_id'=>AppData::TESTIMONIAL])->all();
    }
}
