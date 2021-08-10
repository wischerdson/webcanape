<?php

namespace App\Kernel\Request;

class Cookie
{
	public function set($name, $value, $time = 31536000)
	{
		setcookie($name, $value, time() + $time, '/');
	}

	public function get($name, $default = null)
	{
		return $this->has($name) ? $_COOKIE[$name] : $default;
	}

	public function has($name)
	{
		return isset($_COOKIE[$name]);
	}

	public function delete($name)
	{
		if ($this->has($name)) {
			$this->set($name, '', -3600);
			unset($_COOKIE[$name]);
		}
	}
}