<?php


namespace ronashdkl\kodCms\models\detail;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;

class DetailModel extends BaseModel
{
    protected $loadFromDb = true;
    protected $isMultilanguage = false;

    public $image;
    public $post;

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [[['image','post'], 'safe']]);
    }

    public function formTypes()
    {
        return ArrayHelper::merge(parent::formTypes(),[
            'image'=>[
                'type'=>FieldConfig::IMAGE
            ],
            'post' => [
                // 'value' => $this->text,
                'type' => FieldConfig::SELECT,
                'config'=> [
                    'options' => ['multiple'=>false, 'placeholder' => 'Search Post'],

                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => Url::toRoute(['/admin/api/search-post']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(user) { return user.text; }'),
                        'templateSelection' => new JsExpression('function (user) {return user.text; }'),
                    ],

                ]
            ]
        ]);
    }
}