<?php

namespace App\Kernel\Router;

use App\Kernel\Router\URLDispatcher;

class Router
{
	private $routes = [];

	private $dispatcher = null;

	public function __construct()
	{

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
		return $this->getDispatcher()->dispatch(strtoupper($method), $uri);
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