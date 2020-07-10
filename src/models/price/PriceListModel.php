<?php


namespace ronashdkl\kodCms\models\price;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\ListModel;
use yii\helpers\ArrayHelper;

class PriceListModel extends ListModel
{
public $name;
public $summary;
public $price;
public $feature;

const TYPE_AVAILABLE = 'available';
const TYPE_UNAVAILABLE = 'unavailable';

public function rules()
{
    return ArrayHelper::merge(parent::rules(),[
        [['name','summary','price','feature'],'safe']
    ]);
}

    public function formTypes()
    {
        return [
            'name'=>[
                'type'=>FieldConfig::INPUT
            ],
            'summary'=>[
                'type'=>FieldConfig::INPUT
            ],
            'price[sign]'=>[
                'type'=>FieldConfig::INPUT,
                'label'=>'Currency'
            ],
            'price[digit]'=>[
                'type'=>FieldConfig::INPUT,
                'label'=>'Price'
            ],
            'price[recuring]'=>[
                'type'=>FieldConfig::RADIO,
                'data'=>['monthly'=>'Monthly','yearly'=>'Yearly'],
                'label'=>'Frequency'
            ],
            'price[isBest]'=>[
                'type'=>FieldConfig::CHECKBOX,
                'data'=>[1=>'Yes'],
                'label'=>'Best Value?',
                'hint'=>'Verify that only one package is listed as best value'
            ],
            'feature[available]'=>[
                'type'=>FieldConfig::TEXTAREA,
                'label'=>'Available Features',
                'hint'=>'Separate by comma(,)'
            ],
            'feature[unavailable]'=>[
                'type'=>FieldConfig::TEXTAREA,
                'label'=>'Un Available Features',
                'hint'=>'Separate by comma(,)'
            ],

        ];
    }

    public function displayAttributes()
    {
       return ['name','summary'];
    }

    public function getFeatures($type){
     return explode(',',trim($this->feature[$type]));
    }

}