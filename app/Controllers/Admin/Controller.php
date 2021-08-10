<?php

namespace App\Controllers\Admin;

use App\Kernel\Controller as BaseController;

abstract class Controller extends BaseController
{
	private $auth;

	public function __construct(...$args)
	{
		parent::__construct(...$args);
		$this->auth = $this->container->get('auth');

		if (!$this->auth->check()) {
			header('Location: /admin.php?p=sign-in');
			exit;
		}

		echo 'Проверка пройдена';
	}
}