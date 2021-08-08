<?php

namespace App\Kernel;

use App\Kernel\Container;

class Application
{
	private $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	public function run()
	{
		$router = $this->container->get('router');
		require ROUTE_LIST;

		$uri = array_key_exists('p', $_GET) ? trim($_GET['p'], '/') : '';
		$routerDispatch = $router->dispatch($_SERVER['REQUEST_METHOD'], $uri);
	}
}
