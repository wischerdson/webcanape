<?php

namespace App\Controllers\Admin;

use App\Kernel\Controller;

class AuthController extends Controller
{
	public function index()
	{
		// $a = (new \App\Models\Company($this->request))->where('id', 2)->update(['name' => 'Amazonn', 'logo' => 'aaa']);
		
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