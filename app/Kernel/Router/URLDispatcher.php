<?php

namespace App\Kernel\Router;

use App\Kernel\Router\DispatchedRoute;

class URLDispatcher
{
	private $routes = [ 'GET' => [], 'POST' => [] ];

	public function register($route)
	{
		$this->routes[$route['method']][] = [
			'pattern' => $this->convertPattern($route['pattern']),
			'controller' => $route['controller'],
			'action' => $route['action'],
		];
	}

	/*
		Пример работы метода
		company/{company_id}/review/{review_id}  ->  company/(?<company_id>.*?)/review/(?<review_id>[\d\w\-_%\.]+)
	*/
	private function convertPattern($pattern)
	{
		return preg_replace_callback('/{(.*?)}/', function ($match) {
			return "(?<$match[1]>[\d\w\-_%\.]+)";
		}, $pattern);
	}

	public function dispatch($method, $uri)
	{
		$routes = $this->routes[$method];

		foreach ($routes as $route) {
			if (preg_match("#^{$route['pattern']}$#", $uri, $parameters)) {
				return new DispatchedRoute($route['controller'], $route['action'], $parameters);
			}
		}

		return null;
	}
}