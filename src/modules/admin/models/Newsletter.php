<?php

namespace ronashdkl\kodCms\modules\admin\models;

use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\modules\admin\models\activeQuery\NewsletterQuery;
use ronashdkl\kodCms\modules\admin\models\behaviours\Logbehaviour;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;


/**
 * This is the model class for table "newsletter".
 *
 * @property int $id
 * @property string $email
 * @property int $subscribe
 * @property string $created_at
 * @property string $updated_at
 * @property string $ip
 */
class Newsletter extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'newsletter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['subscribe'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 100],
            [['ip'], 'string', 'max' => 90],
            [['email'], 'unique','message' => 'You have already subscribed our newsletter. '.Html::a('Click Here',['/api/unsubscribe','email'=>$this->email],['class'=>'btn btn-danger unsubscribe','role'=>'modal-remote']).' to unsubscribe'],
        ];
    }

    public function formTypes()
    {
        return [
            'email' => [
                'type' => FieldConfig::INPUT,
                'config' => ['type' => 'email']
            ]
        ];

    }

    public function displayAttributes()
    {
        return [
            'email',
            'created_at',
            'ip'
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => date('Y-m-d h:i')
            ],
            [
                'class' => Logbehaviour::class,
                'attribute' => 'email',
            ]

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'subscribe' => 'Subscribe',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'ip' => 'Ip',
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        };
        $this->ip = Yii::$app->request->remoteIP;
        return true;
    }

    /**
     * {@inheritdoc}
     * @return NewsletterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsletterQuery(get_called_class());
    }
}
