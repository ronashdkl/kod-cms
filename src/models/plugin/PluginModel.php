<?php


namespace ronashdkl\kodCms\models\plugin;



use ronashdkl\kodCms\models\BaseModel;

class PluginModel extends BaseModel
{

    public $loadFromDb = true;
    public $listAttribute = 'list';
    public $listClass = PluginListModel::class;
    public $list;

    public function rules()
    {
        return [['list', 'safe']];
    }


}