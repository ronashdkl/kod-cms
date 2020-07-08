<?php


namespace ronashdkl\kodCms\models\portfolio;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\config\AppData;
use ronashdkl\kodCms\models\BaseModel;
use ronashdkl\kodCms\models\post\PostModel;
use yii\helpers\ArrayHelper;

class PortfolioModel extends BaseModel
{
    public $isMultilanguage = true;
    public $loadFromDb = true;

    public $background;

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['background', 'string']
        ]);
    }

    public function formTypes()
    {
        return ArrayHelper::merge(parent::formTypes(), [
            'background' => [
                'type' => FieldConfig::IMAGE
            ]
        ]);
    }

    public function getlist()
    {
        return PostModel::find()->where(['tree_id' => AppData::Portfolio])->all();
    }

    public function getBackground()
    {
        if($this->background==null){
           return  $this->background = '/web/images/pattern/pattern17.png';
        }else{
            return $this->background;
        }
    }
}
