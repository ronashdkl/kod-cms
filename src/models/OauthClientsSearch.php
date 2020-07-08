<?php

namespace ronashdkl\kodCms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ronashdkl\kodCms\models\OauthClients;

/**
 * OauthClientsSearch represents the model behind the search form about `ronashdkl\kodCms\models\OauthClients`.
 */
class OauthClientsSearch extends OauthClients
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'client_secret', 'redirect_uri', 'grant_types', 'scope'], 'safe'],
            [['user_id'], 'integer'],
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
        $query = OauthClients::find();

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
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'client_id', $this->client_id])
            ->andFilterWhere(['like', 'client_secret', $this->client_secret])
            ->andFilterWhere(['like', 'redirect_uri', $this->redirect_uri])
            ->andFilterWhere(['like', 'grant_types', $this->grant_types])
            ->andFilterWhere(['like', 'scope', $this->scope]);

        return $dataProvider;
    }
}
