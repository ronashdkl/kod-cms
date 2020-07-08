<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\config\AppData;
use ronashdkl\kodCms\models\UserProject;
use ronashdkl\kodCms\modules\admin\models\Post;
use ronashdkl\kodCms\modules\admin\models\Tree;
use ronashdkl\kodCms\modules\admin\models\User;
use Mpdf\Tag\VarTag;
use yii\db\Query;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\httpclient\Client;

class ApiController extends \yii\rest\Controller
{
    public function actionRemoveImage()
    {
        $request = \Yii::$app->request->getBodyParam('key');
        $data = explode('##', $request);
        $product = post::findOne(['id' => (int)$data[0]]);
        if ($product == null) {
            return ['error' => true, 'message' => 'not found'];
        }
        $images = $product->getImages();
        $file = \Yii::getAlias('@webroot' . $data[1]);
        if (is_file($file)) {
            if (unlink($file)) {
                $images = array_filter($images, function ($img) use ($data) {
                    if ($img != $data[1]) {
                        return $img;
                    }
                });
            }
        }
        $product->images = json_encode($images);
        if ($product->save(false)) {
            return $images;
        }

    }
    public function actionRemoveAvatar()
    {
        $request = \Yii::$app->request->getBodyParam('key');

        $product = post::findOne(['id' =>$request]);
        $product->unlinkAvatar();
        if ($product->update(false,['avatar'])) {
            return null;
        }

    }

    public function actionRemoveSlider()
    {
        $key = \Yii::$app->request->getBodyParam('key');

        $file = \Yii::getAlias('@webroot' . $key);
        if (is_file($file)) {
            if (unlink($file)) {
                return null;
            }
        }

    }


    public function actionUserList($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'username' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id, username as text')
                ->from('user')
                ->where(['like', 'username', $q])
                ->orWhere(['=','id',$q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => User::findOne($id)->username];
        }
        return $out;
    }
    public function actionSearchPost($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'title' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('title as text,slug as id')
                ->from('post')
                ->where(['tree_id'=>AppData::PAGE])
                ->andFilterWhere(['like', 'title', $q])
                ->orWhere(['=','id',$q])
                ->limit(10);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } else{
            $post = Post::find()->select('title as text, slug as id')->where(['slug'=>$id])->asArray()->one();
            $out['results'] = $post;
        }
        return $out;
    }

    public function actionRemoveUserFromProject()
    {
        $request = \Yii::$app->request;
$id = User::find()->select('id')->where(['username'=>$request->getBodyParam('username')])->asArray()->one()['id'];

        $user = UserProject::find()->where(['user_id' =>$id])->andWhere(['project_id' => $request->getBodyParam('id')])->one();
        if ($user) {
            return (boolean)$user->delete();
        } else {
            return false;
        }
    }

}
