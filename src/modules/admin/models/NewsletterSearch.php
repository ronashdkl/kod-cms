<?php

namespace ronashdkl\kodCms\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ronashdkl\kodCms\modules\admin\models\Gallery;

/**
 * GallerySearch represents the model behind the search form about `ronashdkl\kodCms\modules\admin\models\Gallery`.
 */
class NewsletterSearch extends Newsletter
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'subscribe', 'created_at', 'updated_at'], 'integer'],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
        $query = Newsletter::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'subscribe' => $this->subscribe,

            'created_at' => $this->created_at,

            'updated_at' => $this->updated_at,

        ]);

        $query->andFilterWhere(['like', 'email', $this->email]);


        return $dataProvider;
    }
}
