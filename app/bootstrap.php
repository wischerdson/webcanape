<?php

use App\Kernel\Application;
use App\Kernel\Container;

$dotenv = \Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();

function boot($services)
{
	$container = new Container;

	foreach ($services as $service) {
		$provider = new $service($container);
		$provider->init();
	}

	$app = new Application($container);
	$app->run();
}
