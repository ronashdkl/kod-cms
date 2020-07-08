<?php

namespace ronashdkl\kodCms\models\activeQuery;

/**
 * This is the ActiveQuery class for [[\ronashdkl\kodCms\models\PriceInquiry]].
 *
 * @see \ronashdkl\kodCms\models\PriceInquiry
 */
class PriceInquiryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\models\PriceInquiry[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\models\PriceInquiry|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
