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
		$this->router->add('/sss', [\App\Controllers\HomeController::class, 'index', 'GET']);
		$this->router->add('company/{company_id}/review/{review_id}', [\App\Controllers\HomeController::class, 'index1', 'GET']);

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
