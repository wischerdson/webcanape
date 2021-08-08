<?php

namespace App\Kernel\Request;

class Request
{
	public $params;

	public $files;

	public $cookie;

	public $server;

	public $method;

	public function __construct()
	{
		$this->params = array_merge($_GET, $_POST);
		$this->cookie = $_COOKIE;
		$this->files = $_FILES;
		$this->server = $_SERVER;
		$this->method = strtoupper($this->server['REQUEST_METHOD']);
	}

	public function __get($name)
	{
		return $this->input($name);
	}

	public function all()
	{
		return $this->params;
	}

	public function path()
	{
		return trim($this->input('p', ''), '/');
	}

	public function input($name, $default = null)
	{
		return $this->has($name) ? $this->params[$name] : $default;
	}

	public function has($name)
	{
		return isset($this->params[$name]);
	}

	public function missing($name)
	{
		return !$this->has($name);
	}
}