<?php

namespace App\Kernel\Services;

use App\Kernel\Services\AbstractProvider;
use App\Kernel\Router\Router;

class RouterProvider extends AbstractProvider
{
	public $service = 'router';

	public function init()
	{
		$router = new Router();
		$this->container->add($this->service, $router);
	}
}
