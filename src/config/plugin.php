<?php

use yii\helpers\VarDumper;

/**
 * Frontend Config
 */
$frontend_controllerMap = [];

/**
 * Backend Config
 */
$backend_controllerMap = [];

$files = glob( __DIR__ ."/../plugins/*/plugin.ini", GLOB_BRACE);

foreach ($files as $file){
    $iniFile = parse_ini_file($file,true);
    if(isset($iniFile['active']) && $iniFile['active']=='1'){
        if(isset($iniFile['frontend'])){
            $frontend_controllerMap[] =  $iniFile['frontend']['controllerMap'];
        }
        if(isset($iniFile['backend'])){
            $backend_controllerMap[] =  $iniFile['backend']['controllerMap'];
            if(isset($iniFile['backend']['menu'])){
                $backendMenu = $iniFile['backend']['menu'];
            }
        }
    }
}
