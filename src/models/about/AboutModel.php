<?php


namespace ronashdkl\kodCms\models\about;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * Class AboutModel
 * @property string $summary
 * @property string $title
 * @property AboutListModel[] $list
 * @package ronashdkl\kodCms\models\service
 */
class AboutModel extends BaseModel
{

    protected $loadFromDb = true;
    public $listAttribute = 'list';
    public $listClass = AboutListModel::class;
    // public $styleAttribute = 'style';
    //public $styleClass = AboutStyleModel::class;
    public $summary;
    public $title;
   // public $style;
    public $list;
    public $image;
    public $unsafe;
    public $image_position;



    public function rules()
    {

        return ArrayHelper::merge(parent::rules(), [

            [['image'], 'string'],
            ['image_position','safe'],
            ['list','safe']

        ]);

    }

    public function formTypes()
    {
        return ArrayHelper::merge(parent::formTypes(),
            [
                'image' => [
                    // 'value' => $this->display,
                    'type' => FieldConfig::IMAGE,
                ],
                'image_position' => [
                    // 'value' => $this->display,
                    'type' => FieldConfig::RADIO,
                    'data'=>['left'=>'Left','right'=>'Right']
                ],

            ]
        );

    }


}
