<?php

namespace ronashdkl\kodCms\modules\admin\models;

use ronashdkl\kodCms\models\UserProject;
use Yii;
use yii\base\NotSupportedException;
use yii\db\Query;

class User extends \dektrium\user\models\User
{

    /** @inheritdoc */
    public static function findIdentityByAccessToken($token, $type = null){
        $query = new Query;
        $query->select('access_token, user_id')
            ->from('oauth2_access_token')
            ->limit(1);
        $user =  $query->one();

        return static::findOne(['id' => $user['user_id']]);
    }

    public function getProjects()
    {
        return $this->hasMany(UserProject::class, ['user_id' => 'id'])
            ->viaTable('post', ['project_id' => 'project_id']);
    }

}
