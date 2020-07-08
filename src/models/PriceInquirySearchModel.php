<?php

namespace ronashdkl\kodCms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ronashdkl\kodCms\models\PriceInquiry;

/**
 * PriceInquirySearchModel represents the model behind the search form about `ronashdkl\kodCms\models\PriceInquiry`.
 */
class PriceInquirySearchModel extends PriceInquiry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'number', 'phone'], 'integer'],
            [['type', 'service', 'date', 'name', 'email', 'current_address', 'current_residence', 'current_residence_lift', 'current_residence_floor', 'new_address', 'new_living_space', 'new_residence', 'new_residence_lift', 'new_residence_floor', 'floor', 'grid_deductions', 'counted_cubic', 'other_info', 'find_us', 'status', 'date_time'], 'safe'],
            [['current_living_space'], 'number'],
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
        $query = PriceInquiry::find();

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
            'number' => $this->number,
            'phone' => $this->phone,
            'current_living_space' => $this->current_living_space,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'service', $this->service])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'current_address', $this->current_address])
            ->andFilterWhere(['like', 'current_residence', $this->current_residence])
            ->andFilterWhere(['like', 'current_residence_lift', $this->current_residence_lift])
            ->andFilterWhere(['like', 'current_residence_floor', $this->current_residence_floor])
            ->andFilterWhere(['like', 'new_address', $this->new_address])
            ->andFilterWhere(['like', 'new_living_space', $this->new_living_space])
            ->andFilterWhere(['like', 'new_residence', $this->new_residence])
            ->andFilterWhere(['like', 'new_residence_lift', $this->new_residence_lift])
            ->andFilterWhere(['like', 'new_residence_floor', $this->new_residence_floor])
            ->andFilterWhere(['like', 'floor', $this->floor])
            ->andFilterWhere(['like', 'grid_deductions', $this->grid_deductions])
            ->andFilterWhere(['like', 'counted_cubic', $this->counted_cubic])
            ->andFilterWhere(['like', 'other_info', $this->other_info])
            ->andFilterWhere(['like', 'find_us', $this->find_us])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'date_time', $this->date_time]);

        return $dataProvider;
    }
}
