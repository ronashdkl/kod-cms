<?php

namespace ronashdkl\kodCms\models;

/**
 * This is the ActiveQuery class for [[\ronashdkl\kodCms\modules\admin\models\Order]].
 *
 * @see \ronashdkl\kodCms\modules\admin\models\Order
 */
class PriceInqueryActiveQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\Order[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\Order|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
