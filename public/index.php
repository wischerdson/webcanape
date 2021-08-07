<?php

use App\Kernel\Application;
use App\Kernel\Container;

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

define('ROOT', __DIR__.'/..');
define('CONFIG_PATH', ROOT.'/config');
define('VIEWS_PATH', ROOT.'/resources/views');

require ROOT.'/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();

$container = new Container;

$services = require CONFIG_PATH.'/services.php';

foreach ($services as $service) {
	$provider = new $service($container);
	$provider->init();
}

$app = new Application($container);
$app->run();
