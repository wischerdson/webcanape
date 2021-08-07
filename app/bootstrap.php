<?php

use App\Kernel\Application;
use App\Kernel\Container;

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
