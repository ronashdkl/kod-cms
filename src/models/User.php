<?php


namespace ronashdkl\kodCms\models;


use conquer\oauth2\OAuth2IdentityInterface;

use Yii;

class User extends \ronashdkl\kodCms\modules\admin\models\User implements OAuth2IdentityInterface
{
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findIdentityByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }


}
