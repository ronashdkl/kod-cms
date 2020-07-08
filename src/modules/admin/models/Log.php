<?php

namespace ronashdkl\kodCms\modules\admin\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "log".
 *
 * @property int $id
 * @property string $log
 * @property string $created_at
 * @property int $created_by
 * @property string $ip_address
 * @property string $data
 */
class Log extends \yii\db\ActiveRecord
{
    private $userInfo;
    public $detail = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['log', 'data'], 'string'],
            [['created_at'], 'safe'],
            [['created_by'], 'integer'],
            [['ip_address'], 'string', 'max' => 40],
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $ip = Yii::$app->geoip->ip();
        $this->ip_address = Yii::$app->request->userIP;
        if (!Yii::$app->user->isGuest) {
            $this->created_by = Yii::$app->user->identity->getId();
        }

        $this->created_at = date('Y-m-d h:i');
        $this->detail['agent'] = Yii::$app->request->getUserAgent();
        $this->detail['location'] = $ip;
        $this->data = json_encode($this->detail);
        return true;
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->userInfo = json_decode($this->data,true);
    }

    public function getUserInfo($attribute = 'agent'){
        if(!isset($this->userInfo[$attribute])){
            return null;
        }
        return $this->userInfo[$attribute];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'log' => Yii::t('app', 'Log'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'user.username' => Yii::t('app', 'Username'),
            'ip_address' => Yii::t('app', 'Ip Address'),
            'data' => Yii::t('app', 'Data'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by'])->select('id,username');
    }

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\activeQuery\LogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \ronashdkl\kodCms\modules\admin\models\activeQuery\LogQuery(get_called_class());
    }
}
