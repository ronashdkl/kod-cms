<?php


namespace ronashdkl\kodCms\modules\api\controllers\v1;


use ronashdkl\kodCms\models\Oauth2AccessToken;
use yii\db\Query;
use yii\db\QueryBuilder;
use yii\helpers\VarDumper;

class ProfileController extends Controller
{

    public function actionIndex()
    {


        //  return \Yii::$app->user->identity;
        $result = Oauth2AccessToken::find()
            // ->select('client_id as id,user_id')
            ->where(['access_token' => \Yii::$app->request->getQueryParam('access_token')])
            ->joinWith('user')
            ->asArray()
            ->one();
     //   $result['id'] = $result['client_id'] . '#' . $result['user_id'];
        $result['id'] = $result['client_id'];
        unset($result['access_token']);
        unset($result['client_id']);
        unset($result['user_id']);
        unset($result['user']['unconfirmed_email']);
        unset($result['user']['password_hash']);
        return $result;
        /*$query = new Query;
// compose the query
        $query->select('client_id as id')
            ->innerJoin('user')
            ->from('oauth2_access_token')
            ->limit(1);

        return $query->one();*/

    }
}
