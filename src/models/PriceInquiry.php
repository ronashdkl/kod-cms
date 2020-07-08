<?php

namespace ronashdkl\kodCms\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "price_inquiry".
 *
 * @property int $id
 * @property int $type
 * @property string $service
 * @property int $date
 * @property string $name
 * @property int $number
 * @property string $email
 * @property int $phone
 * @property string $current_address
 * @property double $current_living_space
 * @property int $current_residence
 * @property int $current_residence_lift
 * @property int $current_residence_floor
 * @property string $new_address
 * @property double $new_living_space
 * @property int $new_residence
 * @property int $new_residence_lift
 * @property int $new_residence_floor
 * @property int $floor
 * @property int $grid_deductions
 * @property double $counted_cubic
 * @property string $other_info
 * @property int $find_us
 * @property int $status
 * @property int $date_time
 * @property string $kubik
 */
class PriceInquiry extends \yii\db\ActiveRecord
{
    public $reCaptcha;
    public $current_postnr;
    public $new_postnr;
    public $kubik;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'price_inquiry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'service', 'date', 'name', 'number', 'email', 'phone', 'current_address', 'current_living_space', 'current_residence', 'current_residence_lift', 'current_residence_floor', 'new_address', 'new_living_space', 'new_residence', 'new_residence_lift', 'new_residence_floor', 'floor', 'grid_deductions', 'other_info'], 'safe'],
            [['service', 'date', 'name', 'number', 'email', 'phone'], 'required'],
            [['type', 'number', 'current_residence', 'current_residence_lift', 'current_residence_floor', 'new_residence', 'new_residence_lift', 'new_residence_floor', 'floor', 'grid_deductions', 'find_us', 'status', 'date_time'], 'string'],
            [['counted_cubic'], 'string'],
            [['current_city','new_city'],'string'],
            [['other_info'], 'string'],
            ['kubik','safe'],
            ['phone','string'],
            [['email'], 'email'],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator2::className(),
                'uncheckedMessage' => Yii::t('site','Please confirm that you are not a bot.')],
            [['date', 'name', 'email', 'current_address', 'new_address'], 'string', 'max' => 255],
            [['current_postnr','current_postnr'],'number']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Jag är'),
            'service' => Yii::t('app', 'Önskat pris för'),
            'date' => Yii::t('app', 'Önskat Flyttdatum'),
            'name' => Yii::t('app', 'Namn / Företag'),
            'number' => Yii::t('app', 'Personnummer / Org.nr:'),
            'email' => Yii::t('app', 'E-post'),
            'phone' => Yii::t('app', 'Telefon'),
            'current_address' => Yii::t('app', 'Nuvarande adress'),
            'current_living_space' => Yii::t('app', 'Nuvarande bostadsyta i kvm'),
            'current_residence' => Yii::t('app', ''),
            'current_residence_lift' => Yii::t('app', 'Finns det en hiss?'),
            'current_residence_floor' => Yii::t('app', 'Våning på aktuell adress'),
            'current_city' => Yii::t('app', 'Nuvarande stad'),
            'new_address' => Yii::t('app', 'Ny adress'),
            'new_city' => Yii::t('app', 'Ny stad'),
            'new_living_space' => Yii::t('app', 'Nytt bostadsyta i kvm'),
            'new_residence' => Yii::t('app', ''),
            'new_residence_lift' => Yii::t('app', 'Finns det en hiss?'),
            'new_residence_floor' => Yii::t('app', 'Våning på ny adress'),
            'floor' => Yii::t('app', 'Våning'),
            'grid_deductions' => Yii::t('app', 'Härmed intygar jag att vi har rätt till rutavdrag/skattereduktion'),
            'counted_cubic' => Yii::t('app', 'Antal kubik   ( i )'),
            'other_info' => Yii::t('app', 'Annan information'),
            'find_us' => Yii::t('app', 'Find Us'),
            'status' => Yii::t('app', 'Status'),
            'date_time' => Yii::t('app', 'Date Time'),
            'current_postnr'=>'Postnr',
            'new_postnr'=>'Postnr'
        ];
    }

    public function attributeHints()
    {
        return ArrayHelper::merge(parent::attributeHints(),
            ['counted_cubic' => 'Antalet kubik fylls i automatiskt om du använder kubikräknaren först.<br>Du har även möjlighet att fylla i detta själv.']
        );
    }

    /**
     * @return bool
     */
    public function notifyAdmin()
    {
        try {
           return  Yii::$app->mailer->compose('form', ['model' => $this])
                ->setFrom(Yii::$app->params['senderEmail'])
                ->setTo(Yii::$app->params['adminEmail'])
                ->setReplyTo([$this->email=>$this->name])
                ->setSubject('Prisförfrågan från '.$this->name)
                ->send();
        }catch (\Exception $e){
            Yii::$app->session->setFlash('info','We are unable to notify system admin, Please contact us to notify your form submission. ');
            return false;
        }

    }


    /**
     * {@inheritdoc}
     * @return PriceInqueryActiveQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PriceInqueryActiveQuery(get_called_class());
    }
}
