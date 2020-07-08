<?php

namespace ronashdkl\kodCms\models\post;

/**
 * This is the ActiveQuery class for [[PostEnquiry]].
 *
 * @see PostEnquiry
 */
class PostEnquiryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PostEnquiry[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PostEnquiry|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
