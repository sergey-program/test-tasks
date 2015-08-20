<?php

date_default_timezone_set('UTC');

define('DS', DIRECTORY_SEPARATOR);
define('FILE_PATH_ROOT_WEB', __DIR__ . DS);
define('FILE_PATH_ROOT', FILE_PATH_ROOT_WEB . '..' . DS);
define('FILE_PATH_VENDOR', FILE_PATH_ROOT . 'vendor' . DS);

// folder for config
$env = 'test';
$env = file_exists(FILE_PATH_ROOT . '.dev') ? 'dev' : $env;
$env = file_exists(FILE_PATH_ROOT . '.prod') ? 'prod' : $env;
defined('YII_ENV') or define('YII_ENV', $env);

// debug mode
$debug = ($env == 'test' || $env == 'dev') ? true : false;
defined('YII_DEBUG') or define('YII_DEBUG', $debug);

if ($env != 'prod') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

define('FILE_PATH_CONFIG', FILE_PATH_ROOT . 'config' . DS);
define('FILE_PATH_CONFIG_ENV', FILE_PATH_CONFIG . $env . DS);

require(FILE_PATH_VENDOR . 'autoload.php');
require(FILE_PATH_VENDOR . 'yiisoft' . DS . 'yii2' . DS . 'Yii.php');

$config = require(FILE_PATH_CONFIG_ENV . 'main_site.php');

$app = new yii\web\Application($config);
$app->run();