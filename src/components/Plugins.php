<?php


namespace ronashdkl\kodCms\components;


use ronashdkl\kodCms\models\plugin\PluginModel;
use yii\base\BaseObject;
use yii\base\Component;
use yii\base\Exception;
use yii\helpers\VarDumper;

class Plugins extends Component
{
    public $path = '@app/plugins';
    public $modelClass;
    public $list = [];
    public function init()
    {
        parent::init();
        $this->listPlugins();

    }

    private function scanPlugins()
    {
        $path = \Yii::getAlias($this->path) . '/plugin.json';
        $files = $this->glob_recursive($path);
        return $files ?? [];
    }

    public function listPlugins()

    {
        $files = $this->scanPlugins();

        if (!$files) return null;

        $plugins = [];

        foreach ($files as $file) {
             $config = json_decode(file_get_contents($file),true);
             $pFile = dirname($file) . "/" . $config['main'] . ".php";

            if (is_file($pFile)) {
                $className = ucfirst($config['main']) . 'Plugin';
                include_once($pFile);
                $plugins[] = ['class'=>new $className(),'meta'=>$config,'file'=>$pFile,'configFile'=>$file];

                break;
            }

        }

        unset($config);
        unset($pFile);
        unset($files);
            $this->list = $plugins;
          //  $this->registerPlugins();
        unset($plugins);

        $this->registerPlugins();
       // return $this->list;
    }


    public function registerPlugins()
    {

        foreach ($this->list as $key=>$plugin) {
            $config = $plugin['meta'];
            $pluginFile = $plugin['file'];
            try {

                /* if($config->token!="Ronash"){
                     break;
                 }*/
                if ($config->status == 1) {
                    include_once($pluginFile);
                    $class = new $plugin['class'];
                    $class->register();
                    $this->list[$key]['class'] =$class;
                }
            } catch (Exception $e) {
                \Yii::error($e->getMessage(), $pluginFile);
            }

        }
        unset($config);
        unset($pluginFile);
        unset($plugin);
    }


    public function disablePlugin($key){
        $plugin = $this->list[$key];
        $config = $plugin['meta'];
        $config['status'] = !$config['status'];
        if(!$config['status']){
            call_user_func([$plugin['class'],'disable']);
        }
        \Yii::$app->session->setFlash($config['status']?'success':'info',!$config['status']?$config['name'].' disabled':$config['name'].' activated');

         file_put_contents($plugin['configFile'],json_encode($config));

         \Yii::$app->cache->delete('plugins');
        unset($config);
        unset($plugin);
        /*  if(!$config['status']){
              $blocks = PostWidgetModel::getInstance();
            VarDumper::dump($blocks->getAttributes(),10,1);
            die;
          }*/
    }
    public function uninstallPlugin($key){
        $plugin = $this->list[$key];
        $config = $plugin['meta'];
        call_user_func([$plugin['class'],'uninstall']);
        file_put_contents($plugin['configFile'],json_encode($config));
        \Yii::$app->session->setFlash($config['status']?'success':'info',$config['status']?$config['name'].' Uninstalled':$config['name'].' Installed');
       unset($this->list[$key]);
        unset($config);
        unset($plugin);
    }


    function glob_recursive($pattern, $flags = 0)
    {
        $files = glob($pattern, $flags);
        foreach (glob(dirname($pattern) . '/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir) {
            $files = array_merge($files, $this->glob_recursive($dir . '/' . basename($pattern), $flags));
        }
        return $files;
    }

}