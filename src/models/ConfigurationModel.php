<?php
/**
 * Created by PhpStorm.
 * User: ronash
 * Date: 2019-06-19
 * Time: 13:41
 */

namespace ronashdkl\kodCms\models;


use yii\db\ActiveRecord;


class ConfigurationModel extends ActiveRecord implements ModelConfigurationInterface
{
    public function getNameOfClass()
    {
        return $this->tableName();
    }

    public function formTypes()
    {
        return false;
    }


    public function load($data, $formName = null)
    {


        $scope = $formName === null ? $this->formName() : $formName;
        if ($scope === '' && !empty($data)) {

            $this->setAttributes($data);

            return true;

        } elseif (isset($data[$scope])) {
            $this->setAttributes($data[$scope]);
            if(isset($data[$this->configClass->getNameOfClass()])){
                $this->{$this->configAttribute} = $data[$this->configClass->getNameOfClass()];
            }
            return true;

        }

        return false;
    }

}
