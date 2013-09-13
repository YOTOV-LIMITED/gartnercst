<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';


// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
$mainConfig=require dirname(__FILE__).'/protected/config/main.php';
$databaseConfig=require dirname(__FILE__).'/protected/config/database.php';
$paramsConfig=require dirname(__FILE__).'/protected/config/params.php';
$config = CMap::mergeArray($mainConfig, $databaseConfig, $paramsConfig);
Yii::createWebApplication($config)->run();
