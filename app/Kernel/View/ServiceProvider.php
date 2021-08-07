<?php

namespace App\Kernel\View;

use App\Kernel\AbstractProvider;

class ServiceProvider extends AbstractProvider
{
	public $service = 'view';

	public function init()
	{
		$view = new View();
		$this->container->add($this->service, $view);
	}
}