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
		$request = $this->container->get('request');
		$router->dispatch($request->method, $request->path());
	}
}
