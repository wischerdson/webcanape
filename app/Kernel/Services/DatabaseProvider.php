<?php

namespace App\Kernel\Services;

use App\Kernel\Services\AbstractProvider;
use App\Kernel\Database\Connection;

class DatabaseProvider extends AbstractProvider
{
	public $service = 'db';

	public function init()
	{
		$db = new Connection();
		$this->container->add($this->service, $db);
	}
}
