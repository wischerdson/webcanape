<?php

namespace App\Kernel\Database;

use App\Kernel\AbstractProvider;
use App\Kernel\Database\Connection;

class ServiceProvider extends AbstractProvider
{
	public $service = 'db';

	public function init()
	{
		$db = new Connection();
		$this->container->add($this->service, $db);
	}
}
