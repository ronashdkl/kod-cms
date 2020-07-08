<?php

namespace ronashdkl\kodCms\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ronashdkl\kodCms\modules\admin\models\SliderMain;

/**
 * SliderMainSearch represents the model behind the search form about `ronashdkl\kodCms\modules\admin\models\SliderMain`.
 */
class SliderMainSearch extends SliderMain
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['image', 'summary', 'title', 'button', 'snow', 'text_class'], 'safe'],
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
        $query = SliderMain::find();

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
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'button', $this->button])
            ->andFilterWhere(['like', 'snow', $this->snow])
            ->andFilterWhere(['like', 'text_class', $this->text_class]);

        return $dataProvider;
    }
}
