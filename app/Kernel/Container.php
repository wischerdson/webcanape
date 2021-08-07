<?php

namespace App\Kernel;

class Container
{
	private $dependencies = [];

	public function add($key, $value)
	{
		$this->dependencies[$key] = $value;

		return $this;
	}

	public function get($key)
	{
		return $this->dependencies[$key];
	}
}