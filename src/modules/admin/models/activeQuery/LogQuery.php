<?php

namespace ronashdkl\kodCms\modules\admin\models\activeQuery;

/**
 * This is the ActiveQuery class for [[\ronashdkl\kodCms\modules\admin\models\Log]].
 *
 * @see \ronashdkl\kodCms\modules\admin\models\Log
 */
class LogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\Log[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\Log|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
