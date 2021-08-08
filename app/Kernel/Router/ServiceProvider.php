<?php

namespace App\Kernel\Router;

use App\Kernel\AbstractProvider;
use App\Kernel\Router\Router;
use App\Kernel\Container;

class ServiceProvider extends AbstractProvider
{
	public $service = 'router';

	public function init()
	{
		$router = new Router($this->container);

		require ROUTE_LIST;

		$this->container->add($this->service, $router);
	}
}
