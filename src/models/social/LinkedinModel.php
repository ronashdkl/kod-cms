<?php


namespace ronashdkl\kodCms\models\social;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

class LinkedinModel extends BaseModel
{
    public $url;
    public $code;
protected $isMultilanguage = false;
    public function rules()
    {
        return ArrayHelper::merge([], [
            [['url', 'code'], 'string']
        ]);
    }

    public function formTypes()
    {
        return ArrayHelper::merge([], [
            'url' => [
                'type' => FieldConfig::INPUT
            ], 'code' => [
                'type' => FieldConfig::CODE,
                'hint'=>Html::a('Click here','//linkedin.com/public-profile/settings/',['target'=>'_blank']).' to generate code for your public profile and paste above'
            ],

        ]);
    }
}
