<?php


namespace ronashdkl\kodCms\models\site;


use ronashdkl\kodCms\models\BaseModel;

/**
 * Class SiteModel
 * @property string $nameOfClass
 * @property string $shot_name
 * @property  string $slogan
 * @property string $email
 * @package ronashdkl\kodCms\models\site
 */
class SiteModel extends BaseModel
{
    public $id;
    public $name;
    public $logo;
    public $short_name;
    public $slogan;
    public $phone;
    public $email;
    public $address;
    public $footer_code;
    public $mon_fri;
    public $sat;
    protected $isMultilanguage = false;

    public function rules()
    {
        return [
            [['name', 'short_name', 'phone', 'email'], 'required'],
            [['name', 'short_name', 'slogan', 'logo', 'address','mon_fri','sat'], 'string'],
            ['phone', 'string'],
            [['footer_code'],'required'],
            ['email', 'email'],
        ];
    }

    public function formTypes()
    {
        return [
            'logo' => [
                'type' => $this->fieldType::IMAGE
            ],
            'name' => [
                'type' => $this->fieldType::INPUT
            ],
            'short_name' => [
                'type' => $this->fieldType::INPUT
            ],
            'slogan' => [
                'type' => $this->fieldType::INPUT
            ],
            'phone' => [
                'type' => $this->fieldType::INPUT,
                'config' => ['type' => 'string']
            ],
            'email' => [
                'type' => $this->fieldType::INPUT,
                'config' => ['type' => 'email']

            ],
            'address' => [
                'type' => $this->fieldType::INPUT,
            ],
            'mon_fri' => [
                'type' => $this->fieldType::INPUT,
            ]
            ,'sat' => [
                'type' => $this->fieldType::INPUT,
            ],
            'footer_code'=>[
                'type'=>$this->fieldType::CODE
            ],

        ];
    }
}
