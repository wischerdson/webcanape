<?php

namespace App\Kernel\Router;

use App\Kernel\Router\URLDispatcher;
use App\Kernel\Container;

class Router
{
	private $routes = [];

	private $dispatcher = null;

	private $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	public function getRoutes()
	{
		return $this->routes;
	}

	public function add($route, $options)
	{
		$this->routes[] = [
			'pattern' => trim($route, '/'),
			'controller' => $options[0],
			'action' => $options[1],
			'method' => array_key_exists(2, $options) ? strtoupper($options[2]) : 'GET'
		];
	}

	public function dispatch($method, $uri)
	{
		$routerDispatch = $this->getDispatcher()->dispatch(strtoupper($method), $uri);

		if (is_null($routerDispatch)) {
			header("HTTP/1.1 404 Not Found");
			echo 'Страница не найдена';
			die();
		}

		$controllerClass = $routerDispatch->getController();
		$action = $routerDispatch->getAction();
		$parameters = $routerDispatch->getParameters();

		$controller = new $controllerClass($this->container);
		$controller->$action(...$parameters);
	}

	public function getDispatcher()
	{
		if ($this->dispatcher === null) {
			$this->dispatcher = new URLDispatcher;

			foreach ($this->routes as $route)
			{
				$this->dispatcher->register($route);
			}
		}

		return $this->dispatcher;
	}
}