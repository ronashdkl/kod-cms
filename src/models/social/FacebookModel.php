<?php


namespace ronashdkl\kodCms\models\social;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class FacebookModel extends BaseModel
{
    public $code;
    public $url;
    protected $loadFromDb = true;
    protected $isMultilanguage = false;

    public function rules()
    {
        return ArrayHelper::merge([], [
            [['code', 'url'], 'string']
        ]);
    }

    public function formTypes()
    {
        return ArrayHelper::merge([], [
            'url' => [
                'type' => FieldConfig::INPUT
            ], 'code' => [
                'type' => FieldConfig::CODE,
                'hint' => \yii\bootstrap\Html::a('Click here', '//developers.facebook.com/docs/plugins/page-plugin/', ['target' => '_blank']) . ' to generate code for your facebook page and paste above'

            ],
        ]);
    }
}
