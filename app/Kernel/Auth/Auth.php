<?php

namespace App\Kernel\Auth;

use App\Kernel\Database\Db;
use App\Kernel\Container;

class Auth
{
	private $container;

	private $request;

	public function __construct(Container $container)
	{
		$this->container = $container;
		$this->request = $this->container->get('request');
	}

	public function check()
	{
		$token = $this->request->cookie->get('auth_token');

		return DB::table('admin_sessions')->where('token', $token)->exists();
	}

	public function authenticate()
	{
		$token = $this->getRandomStr();
		Db::table('admin_sessions')->create(['token' => $token]);
		$this->request->cookie->set('auth_token', $token);
	}

	public function logout()
	{

	}

	private function getRandomStr($length = 40)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
		    $randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}