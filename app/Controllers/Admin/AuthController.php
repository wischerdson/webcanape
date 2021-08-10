<?php

namespace App\Controllers\Admin;

use App\Kernel\Controller;

class AuthController extends Controller
{
	public function index()
	{		
		$this->output('admin/pages/sign-in');
	}

	public function signIn()
	{
		$login = $this->request->login;
		$password = $this->request->password;

		if ($login === 'webcanape' and $password = 'admin11') {
			$this->container->get('auth')->authenticate();
		}

		header('Location: /admin.php');
		exit();
	}
}