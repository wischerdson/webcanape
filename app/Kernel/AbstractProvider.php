<?php

namespace App\Kernel;

use App\Kernel\Container;

abstract class AbstractProvider
{
	protected $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	abstract function init();
}