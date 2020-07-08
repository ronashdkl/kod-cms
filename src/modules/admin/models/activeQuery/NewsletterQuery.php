<?php

namespace ronashdkl\kodCms\modules\admin\models\activeQuery;

use ronashdkl\kodCms\modules\admin\models\Newsletter;

/**
 * This is the ActiveQuery class for [[Newsletter]].
 *
 * @see Newsletter
 */
class NewsletterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Newsletter[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Newsletter|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
