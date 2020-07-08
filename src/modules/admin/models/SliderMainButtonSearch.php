<?php

namespace ronashdkl\kodCms\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ronashdkl\kodCms\modules\admin\models\SliderMainButton;

/**
 * SliderMainButtonSearch represents the model behind the search form about `ronashdkl\kodCms\modules\admin\models\SliderMainButton`.
 */
class SliderMainButtonSearch extends SliderMainButton
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'slider_main_id'], 'integer'],
            [['code'], 'safe'],
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
        $query = SliderMainButton::find();

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
            'slider_main_id' => $this->slider_main_id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
