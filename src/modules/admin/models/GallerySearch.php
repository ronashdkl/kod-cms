<?php

namespace ronashdkl\kodCms\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ronashdkl\kodCms\modules\admin\models\Gallery;

/**
 * GallerySearch represents the model behind the search form about `ronashdkl\kodCms\modules\admin\models\Gallery`.
 */
class GallerySearch extends Gallery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'draft', 'featured', 'published', 'created_by', 'updated_by', 'removed_by'], 'integer'],
            [['slug', 'name', 'body', 'images', 'created_at', 'updated_at', 'removed_at'], 'safe'],
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
        $query = Gallery::find();

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
            'draft' => $this->draft,
            'featured' => $this->featured,
            'published' => $this->published,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'removed_at' => $this->removed_at,
            'removed_by' => $this->removed_by,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'images', $this->images]);

        return $dataProvider;
    }
}
