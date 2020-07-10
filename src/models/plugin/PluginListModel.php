<?php


namespace ronashdkl\kodCms\models\plugin;


use ronashdkl\kodCms\models\ListModel;

class PluginListModel extends ListModel
{
public $plugins;
public function rules()
{
    return array_merge(parent::rules(),[
        ['plugins','safe']
    ]);
}

    public function formTypes()
    {
        // TODO: Implement formTypes() method.
    }

    public function displayAttributes()
    {
        // TODO: Implement displayAttributes() method.
    }
}