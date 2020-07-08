<?php

namespace ronashdkl\kodCms\modules\admin\models;

/**
 * This is the ActiveQuery class for [[SliderMainButton]].
 *
 * @see SliderMainButton
 */
class SliderMainButtonQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SliderMainButton[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SliderMainButton|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
