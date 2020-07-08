<?php

namespace ronashdkl\kodCms\models;

/**
 * This is the ActiveQuery class for [[JsonDb]].
 *
 * @see JsonDb
 */
class JsonQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return JsonDb[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @param $name
     * @return array|\yii\db\ActiveRecord|null
     */
    public function name($name)
    {
        return parent::where(['name'=>$name])->one();
    }
    /**
     * {@inheritdoc}
     * @return JsonDb|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
