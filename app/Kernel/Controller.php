<?php

namespace App\Kernel;

use App\Kernel\Container;

abstract class Controller
{
	protected $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}
}