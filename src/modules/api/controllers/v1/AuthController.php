<?php
namespace ronashdkl\kodCms\modules\api\controllers\v1;


use ronashdkl\kodCms\modules\admin\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\rest\Controller;

class AuthController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * @return array|string
     * @throws \yii\base\InvalidConfigException
     * @var User $user
     */
    public function actionIndex()
    {
       $request = json_decode(\Yii::$app->request->getRawBody(),true);

        $return = [
            'error' => true,
            'message' => null,
            'data' => null,
        ];
        if(!isset($request['username']) && !$request['password']){
             $return['message'] = 'username and password required!';
        }
        $user = User::findOne(['username' => $request['username']]);
        if ($user == null || !\Yii::$app->security->validatePassword($request['password'], $user->password_hash)) {
             $return['message'] = 'Invalid Username / password';
        }else{
            $user->last_login_at = \Yii::$app->formatter->asTimestamp(date_create());
            $user->save(false);
            $return['error'] = false;
            $profile = $user->profile;
            $data = ArrayHelper::merge($user->getAttributes(null,['password_hash']),$profile->getAttributes(['name','location']));
            $return['data'] = $data;
            $return['message'] = 'Successfully Logged in!';
        }

        return $return;
    }

    public function actionForget()
    {
        $request = \Yii::$app->request->post();
        $return = [
            'error' => true,
            'message' => null,
            'data' => null,
        ];
        $user = User::findOne(['email' => $request['email']]);
        if ($user == null) {
            return $return['message'] = 'user not found';
        }
        $return['message'] = 'Method not initialized!';
        return $return;
    }
}
