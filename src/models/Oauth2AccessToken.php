<?php

namespace ronashdkl\kodCms\models;

use ronashdkl\kodCms\modules\admin\models\Profile;
use Yii;

/**
 * This is the model class for table "oauth2_access_token".
 *
 * @property string $access_token
 * @property string $client_id
 * @property int $user_id
 * @property int $expires
 * @property string $scope
 *
 * @property Oauth2Client $client
 */
class Oauth2AccessToken extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oauth2_access_token';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['access_token', 'client_id', 'expires'], 'required'],
            [['user_id', 'expires'], 'integer'],
            [['scope'], 'string'],
            [['access_token'], 'string', 'max' => 40],
            [['client_id'], 'string', 'max' => 80],
            [['access_token'], 'unique'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Oauth2Client::className(), 'targetAttribute' => ['client_id' => 'client_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'access_token' => Yii::t('app', 'Access Token'),
            'client_id' => Yii::t('app', 'Client ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'expires' => Yii::t('app', 'Expires'),
            'scope' => Yii::t('app', 'Scope'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(OauthClients::className(), ['client_id' => 'client_id']);
    }
}
