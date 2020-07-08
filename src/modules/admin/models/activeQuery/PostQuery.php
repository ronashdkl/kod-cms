<?php

namespace ronashdkl\kodCms\modules\admin\models\activeQuery;

use ronashdkl\kodCms\config\AppData;

/**
 * This is the ActiveQuery class for [[\ronashdkl\kodCms\modules\admin\models\Post]].
 *
 * @see \ronashdkl\kodCms\modules\admin\models\Post
 */
class PostQuery extends \yii\db\ActiveQuery
{

    public function published()
    {
        return $this->andWhere(['published' => 1]);
    }

    public function draft()
    {
        return $this->andWhere(['published' => 0])->orWhere(['published'=>null]);
    }

    public function featured()
    {
        return $this->andWhere(['featured' => 1]);
    }


    public function trash($showTrash = true)
    {
        if ($showTrash) {
            return $this->andWhere(['!=', 'removed_by', 'null']);
        } else {
            return $this->andWhere(['removed_by' => Null]);

        }
    }

    public function scheduled()
    {
        return $this->andWhere(['!=', 'schedule_date', 'null']);
    }

    public function hideLang($lang)
    {
        return $this->andFilterWhere(['!=', 'hide_language', $lang]);

    }
    /**
     * @param int $show
     * @return PostQuery
     */
    public function projects()
    {
        return $this->andWhere(['tree_id' => AppData::PROJECT]);
    }

    /**
     * @param int $show
     * @return PostQuery
     */
    public function tickets()
    {
        return $this->andWhere(['tree_id' => AppData::TICKET]);
    }

    /**
     * @param int $show
     * @return PostQuery
     */
    public function pages()
    {
        return $this->andWhere(['tree_id' => AppData::PAGE]);
    }
    /**
     * @return PostQuery
     */
    public function completed()
    {
        return $this->andWhere(['completed' => 1]);
    }

    /**
     * @return PostQuery
     */
    public function running()
    {
        return $this->andWhere(['running' => 1]);
    }

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\Post[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\Post|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
