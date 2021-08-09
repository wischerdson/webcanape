<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

define('PUBLIC_DIR', __DIR__);
define('ROOT', __DIR__.'/..');
define('APP_PATH', ROOT.'/app');
define('CONFIG_PATH', ROOT.'/config');
define('VIEWS_PATH', ROOT.'/resources/views');
define('CACHE_PATH', ROOT.'/cache');

define('ROUTE_LIST', CONFIG_PATH.'/routes.php');

require ROOT.'/vendor/autoload.php';

require APP_PATH.'/bootstrap.php';
