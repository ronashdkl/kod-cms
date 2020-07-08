<?php

namespace ronashdkl\kodCms\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "json".
 *
 * @property int $id
 * @property string $name
 * @property array $data
 * @property string $created_at
 * @property string $updated_at
 */
class JsonDb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'json';
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => date('Y-m-d h:i')
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'data'], 'required'],
            [['data', 'created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function beforeSave($insert)
    {
        $this->data = json_encode($this->data);
        return parent::beforeSave($insert);
    }

    /**
     * @return mixed
     */
    public function getData(){
        return json_decode($this->data,true);
    }

    /**
     * {@inheritdoc}
     * @return JsonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new JsonQuery(get_called_class());
    }
}
