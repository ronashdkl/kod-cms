<?php

namespace ronashdkl\kodCms\modules\admin\models\activeQuery;

/**
 * This is the ActiveQuery class for [[\ronashdkl\kodCms\modules\admin\models\Gallery]].
 *
 * @see \ronashdkl\kodCms\modules\admin\models\Gallery
 */
class GalleryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/
    public function published()
    {
        return $this->andWhere(['published'=>1]);
    }

    public function draft()
    {
        return $this->andWhere(['published'=>0]);
    }

    public function featured()
    {
        return $this->andWhere(['featured'=>1]);
    }
    public function trash($showTrash = true)
    {
        if($showTrash){
            return $this->andWhere(['!=', 'removed_by', 'null']);
        }else{
            return $this->andWhere(['removed_by'=>Null]);

        }
    }
    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\Gallery[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\Gallery|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
