<?php

namespace App\Kernel\Router;

class DispatchedRoute
{
	private $controller;

	private $action;

	private $parameters;

	public function __construct($controller, $action, $parameters = [])
	{
		$this->controller = $controller;
		$this->action = $action;
		$this->parameters = $parameters;
	}

	public function getController()
	{
		return $this->controller;
	}

	public function getAction()
	{
		return $this->action;
	}

	public function getParameters()
	{
		$parameters = [];
		foreach ($this->parameters as $key => $value) {
			if (is_int($key) and $key !== 0) {
				$parameters[] = $value;
			}
		}
		return $parameters;
	}
}
