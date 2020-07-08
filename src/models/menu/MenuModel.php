<?php


namespace ronashdkl\kodCms\models\menu;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;
use yii\helpers\ArrayHelper;

/**
 * Class AboutModel
 * @property string $summary
 * @property string $title
 * @property boolean $isTransparent
 * @property MenuListModel[] $list
 * @package ronashdkl\kodCms\models\service
 */
class MenuModel extends BaseModel
{
    public $listAttribute = 'list';
    public $listClass = MenuListModel::class;
    public $styleAttribute = 'style';
    public $styleClass = MenuStyleModel::class;

    public $mode;
    public $list;
   public $style;

    public function rules()
    {

        return [
            [['list','style'], 'safe'],
            ['mode', 'required']

        ];

    }
    private function getData(){
      $files =  glob(\Yii::getAlias('@app/widgets/sections/header/views/*.php'));
      $name = [];
      foreach ($files as $file){
          $array = explode('/',$file);
          $last = array_key_last($array);
          $menu =str_replace('.php','',$array[$last]);
          $name[] = [$menu=>ucfirst($menu)];
      }
      return $name;

    }

    public function formTypes()
    {
        return [
            'mode' => [
                'type' => FieldConfig::SELECT,
                'config' => [
                    'data' => ['light'=>'Light'],
                    'options' => ['placeholder' => 'Select a design ...'],

                ]
            ]
        ];

    }

    /**
     * @return bool
     */
    public function getIsTransparent(){
        if($this->mode == 'transparent'){
            return true;
        }
        return false;
    }

    public function orderList()
    {
        ArrayHelper::multisort($this->list, 'position',SORT_ASC);
        return $this;

    }

}
