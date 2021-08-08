<?php

namespace App\Kernel\Request;

use App\Kernel\AbstractProvider;
use App\Kernel\Request\Request;

class ServiceProvider extends AbstractProvider
{
	public $service = 'request';

	public function init()
	{
		$request = new Request();
		$this->container->add($this->service, $request);
	}
}
