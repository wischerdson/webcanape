<?php

namespace App\Kernel;

use App\Kernel\Container;

abstract class Controller
{
	protected $container;

	protected $request;

	private $vars = [];

	public function __construct(Container $container)
	{
		$this->container = $container;
		$this->request = $this->container->get('request');
	}

	public function __set($name, $value)
	{
		$this->setVar($name, $value);
	}

	public function __get($name)
	{
		return $this->vars[$name];
	}

	public function setVar($name, $value)
	{
		$this->vars[$name] = $value;
	}

	public function output($page)
	{
		$this->container->get('view')->render($page.'.php', $this->vars);
	}
}