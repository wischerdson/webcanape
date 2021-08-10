<?php

namespace App\Kernel\Auth;

use App\Kernel\AbstractProvider;
use App\Kernel\Auth\Auth;

class ServiceProvider extends AbstractProvider
{
	public $service = 'auth';

	public function init()
	{
		$auth = new Auth($this->container);

		$this->container->add($this->service, $auth);
	}
}
