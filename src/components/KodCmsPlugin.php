<?php

namespace ronashdkl\kodCms\components;



use yii\base\Component;


abstract class KodCmsPlugin extends Component
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

   public $configFile;

   abstract function install();
   abstract function active();
   abstract function disable();
   abstract function uninstall();

    public function getConfig()
    {
       return json_decode(file_get_contents(dirname(__).$this->configFile));
   }
}