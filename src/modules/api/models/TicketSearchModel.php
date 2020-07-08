<?php


namespace ronashdkl\kodCms\modules\api\models;


use ronashdkl\kodCms\modules\admin\models\Post;
use ronashdkl\kodCms\modules\admin\models\PostSearch;
use yii\data\ActiveDataProvider;

class TicketSearchModel extends PostSearch
{

    public function formName()
    {
        return '';
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Post::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'tag', $this->body])
            ->tickets();


        return $dataProvider;
    }
}
