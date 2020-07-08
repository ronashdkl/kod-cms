<?php

namespace ronashdkl\kodCms\modules\admin\models;

/**
 * This is the ActiveQuery class for [[SliderMain]].
 *
 * @see SliderMain
 */
class SliderMainQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SliderMain[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SliderMain|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
