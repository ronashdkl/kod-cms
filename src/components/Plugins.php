<?php


namespace ronashdkl\kodCms\components;


use ronashdkl\kodCms\models\plugin\PluginModel;
use yii\base\BaseObject;
use yii\base\Component;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\VarDumper;

class Plugins extends Component
{

    public $modelClass;
    public $list = [];

    public function init()
    {
        parent::init();
        $this->listPlugins();

    }

    private function scanPlugins()
    {
        $files = $this->glob_recursive('plugin.json');

        return $files ?? [];
    }

    public function listPlugins()

    {
        $files = $this->scanPlugins();

        if (!$files) return null;

        $plugins = [];

        foreach ($files as $file) {
             $config = json_decode(file_get_contents($file),true);
             if(!isset($config['status'])){
                 $config['status'] = false;
             }
             $pFile = dirname($file) . "/" . $config['main'] . ".php";

            if (is_file($pFile)) {
                $className = ucfirst($config['main']) . 'Plugin';
                include_once($pFile);
                $class = new $className();
                $plugins[] = ['class'=>$class,'meta'=>$config,'file'=>$pFile,'configFile'=>$file];

                    if($config['status']){
                        $class->register();
                    }

            }

        }


        unset($config);
        unset($pFile);
        unset($files);
            $this->list = $plugins;
          //  $this->registerPlugins();
        unset($plugins);

      //  $this->registerPlugins();

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
                    $plugin['class']->register();
                    VarDumper::dump($this->list,10,1);
                    die;
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

        // \Yii::$app->cache->delete('plugins');
        unset($config);
        unset($plugin);
        /*  if(!$config['status']){
              $blocks = PostWidgetModel::getInstance();
            VarDumper::dump($blocks->getAttributes(),10,1);
            die;
          }*/
    }
    public function updatePlugin($key, $id):void{
        try {
            $plugin = $this->getPlugin($key);
            $config = $plugin['meta'];
            call_user_func([$plugin['class'],'update'],$id);
            $config['updated_at'] = date('d M Y h:a');
            $this->saveConfig($plugin['configFile'],$config);
            unset($this->list[$key]);
            unset($key);
            unset($config);
            unset($plugin);
            return;
        }catch (Exception $e){
           // throw  $e;
             \Yii::$app->session->setFlash('error',$e->getMessage());
        }
    }
    public function installPlugin($key):void{
        try {
            $plugin = $this->getPlugin($key);
            $config = $plugin['meta'];
            call_user_func([$plugin['class'],'install']);
            $config['installed_at'] = date('d M Y h:a');
            $this->saveConfig($plugin['configFile'],$config);
            \Yii::$app->session->setFlash($config['status']?'success':'info',$config['status']?$config['name'].' Uninstalled':$config['name'].' Installed');
            unset($this->list[$key]);
            unset($key);
            unset($config);
            unset($plugin);
            return;
        }catch (Exception $e){
            // throw  $e;
            \Yii::$app->session->setFlash('error',$e->getMessage());
        }
    }
    public function uninstallPlugin($key):void{

        try {
            $plugin = $this->getPlugin($key);
            $config = $plugin['meta'];
            call_user_func([$plugin['class'],'uninstall']);
            unset($config['installed_at']);
            unset($config['status']);
            $this->saveConfig($plugin['configFile'],$config);
            \Yii::$app->session->setFlash('success',$config['name'].' Uninstalled');
            unset($this->list[$key]);
            unset($config);
            unset($plugin);
        }catch (Exception $e){
            // throw  $e;
            \Yii::$app->session->setFlash('error',$e->getMessage());

        }

    }

    private function getPlugin($key){
       return  $plugin = $this->list[$key];
    }

    private  function saveConfig($file, $data){
        file_put_contents($file,json_encode($data));
}

   private function glob_recursive($fileName, $flags = 0)
    {
        $folder =scandir(\Yii::getAlias(\Yii::$app->pluginPath),1);
      // VarDumper::dump($folder,10,1);
       // die;
        $plugins = [];
        foreach ($folder as $dir ){
            if($dir[0]=='.'){
                break;
            }
            $plugin =  \Yii::getAlias(\Yii::$app->pluginPath).DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$fileName;
            if(is_file($plugin)){
             $plugins[] =  $plugin;
            }else{
                continue;
            }
        }
        $plugins = ArrayHelper::merge(\Yii::$app->pluginList, $plugins);

       return $plugins;
        /*foreach (glob(dirname($pattern) . '/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir) {
            echo $dir;
            $files = array_merge($files, $this->glob_recursive($dir . '/' . basename($pattern), $flags));
        }*/
       // return $files;
    }

}
