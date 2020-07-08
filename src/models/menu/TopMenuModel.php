<?php


namespace ronashdkl\kodCms\models\menu;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;

/**
 * Class AboutModel
 * @property string $summary
 * @property string $title
 * @property boolean $isTransparent
 * @property MenuListModel[] $list
 * @package ronashdkl\kodCms\models\service
 */
class TopMenuModel extends BaseModel
{
    public $listAttribute = 'list';
    public $listClass = MenuListModel::class;
    // public $styleAttribute = 'style';
    //public $styleClass = AboutStyleModel::class;

    public $mode;
    public $list;

    public function rules()
    {

        return [
            [['list'], 'safe'],
            ['mode', 'required']

        ];

    }
    private function getData(){
      $files =  glob(\Yii::getAlias('@app/widgets/sections/top/views/*.php'));
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
                    'data' => $this->getData(),
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


}
