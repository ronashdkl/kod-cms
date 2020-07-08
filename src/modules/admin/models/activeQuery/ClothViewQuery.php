<?php

namespace ronashdkl\kodCms\modules\admin\models\activeQuery;

/**
 * This is the ActiveQuery class for [[\ronashdkl\kodCms\modules\admin\models\ClothView]].
 *
 * @see \ronashdkl\kodCms\modules\admin\models\ClothView
 */
class ClothViewQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\ClothView[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\ClothView|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
