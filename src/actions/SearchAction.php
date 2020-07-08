<?php


namespace ronashdkl\kodCms\actions;


use ronashdkl\kodCms\models\post\PostModel;
use ronashdkl\kodCms\modules\admin\models\Log;
use ronashdkl\kodCms\modules\admin\models\Post;
use ronashdkl\kodCms\modules\admin\models\PostSearch;
use yii\base\Action;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

class SearchAction extends Action
{
    public $uniqueId = 'search';


    public function beforeRun()
    {
        return parent::beforeRun(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        $keyword = \Yii::$app->request->post('search');
        $products = PostModel::find()->where(['like', 'tag', $keyword])->orFilterWhere(['like', 'title', $keyword])->orFilterWhere(['like', 'language', $keyword]);
        $dataProvider = new ActiveDataProvider([
            'query' => $products,
        ]);
       return $this->controller->renderPartial('search',['dataProvider'=>$dataProvider]);
    }
}