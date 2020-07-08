<?php


namespace ronashdkl\kodCms\modules\admin\models\behaviours;


use ronashdkl\kodCms\modules\admin\exceptions\PropertyException;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class LanguageBehaviour extends RulesBehavior
{
    public $languageAttributes;
    public $languageAttribute;
    public $rules = [[['languageAttribute'], 'safe']]; // added rules to $owner;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'setLanguage',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'setLanguage',
            ActiveRecord::EVENT_AFTER_FIND => 'mapLanguage'
        ];
    }

    public function setLanguage($event)
    {

        if ($this->owner->hasAttribute('language')) {



            $this->owner->language = json_encode($event->sender->languageAttribute);
        }
    }

    public function mapLanguage($event)
    {
        if ($this->owner->hasAttribute('language')) {
            $this->languageAttribute = json_decode($event->sender->language, true);
        }
    }

    public function get($attribute, $language = null)
    {
        if(!$this->owner->hasProperty($attribute)){
            throw new PropertyException($attribute.' is not property of '.get_class($this->owner));
        }
        if ($language == null) {
            $language = \Yii::$app->language;
        }

        return ArrayHelper::getValue($this->languageAttribute, $attribute . '_' . $language, $this->owner->{$attribute});

    }

}