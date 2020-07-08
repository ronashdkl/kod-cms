<?php


namespace ronashdkl\kodCms\models\seo;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;
use yii\helpers\ArrayHelper;

class SeoModel extends BaseModel
{
    public $keyword;
    public $author;
    public $google_site_verification;
    public $google_uid;
protected $isMultilanguage = false;
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['keyword', 'google_site_verification', 'google_uid', 'author'], 'string']
        ]);
    }

    public function attributeLabels()
    {
        $label = parent::attributeLabels();
        $label['summary'] = 'Description';
        return $label;
    }

    public function formTypes()
    {
        return ArrayHelper::merge(parent::formTypes(), [
            'keyword' => [
                'type' => FieldConfig::INPUT
            ], 'google_site_verification' => [
                'type' => FieldConfig::INPUT
            ], 'google_uid' => [
                'type' => FieldConfig::INPUT
            ], 'summary' => [
                'type' => FieldConfig::INPUT
            ],
            'author' => [
                'type' => FieldConfig::INPUT
            ],

        ]);
    }

}