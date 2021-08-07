<?php

namespace App\Kernel;

use App\Kernel\Container;

class Application
{
	private $container;

	public $router;

	public function __construct(Container $container)
	{
		$this->container = $container;
		$this->router = $this->container->get('router');
	}

	public function run()
	{
		$routes = require ROUTE_LIST;
		foreach ($routes as $key => $route) {
			$this->router->add($key, $route);
		}

		$uri = array_key_exists('p', $_GET) ? trim($_GET['p'], '/') : '';
		$routerDispatch = $this->router->dispatch($_SERVER['REQUEST_METHOD'], $uri);

		if (!is_null($routerDispatch)) {
			$controllerClass = $routerDispatch->getController();
			$action = $routerDispatch->getAction();
			$parameters = $routerDispatch->getParameters();

			$controller = new $controllerClass($this->container);
			$controller->$action(...$parameters);
		} else {
			header("HTTP/1.1 404 Not Found");
			echo 'Страница не найдена';
			die();
		}
	}
}
