<?php

namespace App\Kernel;

use App\Kernel\Container;

class Application
{
	private $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	public function run()
	{
		//$db = new \App\Kernel\Database\Connection;
		//$db->execute("INSERT INTO `companies` SET `name`='Apple', `description`='Haha', `logo`='/apple.jpg'");

		echo'<pre>';print_r($this->container);echo'</pre>';
	}
}