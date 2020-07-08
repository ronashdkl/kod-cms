<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'prod');
defined('YII_APP_ID');

 require __DIR__ . '/../vendor/autoload.php';
 require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$GetRequest = $_SERVER['REQUEST_URI'];
list($GetRequest) = explode ("?", $GetRequest);
list($GetRequest) = explode ("#", $GetRequest);
list($GetRequest) = explode (":", $GetRequest);
list($GetRequest) = explode ("'", $GetRequest);

if ($GetRequest[0] == '/')  $GetRequest = substr($GetRequest, 1);
$RT = explode ("/",$GetRequest);
if(!isset($RT[1])){
    $RT[1] = 'home';
}
if(in_array($RT[0],['translatemanager'])) {
    define('YII_APP_ID', 2);
}elseif(in_array($RT[1],['admin','plugins','user','rbac','translatemanager'])) {
      define('YII_APP_ID', 2);
}else{
  define('YII_APP_ID', 1);
}
$config = require __DIR__ . '/../src/config/web.php';
(new \ronashdkl\kodCms\base\Application($config))->run();


