<?php


namespace ronashdkl\kodCms\models\language;


use ronashdkl\kodCms\models\BaseModel;
use yii\helpers\VarDumper;

class LanguageModel extends BaseModel
{
    public $listAttribute = 'list';
    public $listClass = LanguageListModel::class;
    public $list;
    protected $isMultilanguage = false;
    public $default;

    public function init()
    {
        parent::init();
        $this->default = (object)['name' => 'Swedish', 'code' => 'sv', 'language_id' => 'sv_SE', 'flag' => '/media/flags/se.png'];
    }

    public function rules()
    {
        return [['list', 'safe']];
    }

    public function formTypes()
    {
        return [];
    }

    public function activeLanguage()
    {
        $active = array_search(\Yii::$app->language, array_column($this->list, 'code'));
        if ($active === false) {
            return $this->default;
        } else {
            return $this->list[$active];
        }

    }

   /* public function getList()
    {
        if ($this->list) {
            return $this->list;
        }
        return ["en"];
    }*/

}
