<?php

namespace App\Controllers;

use App\Kernel\Controller;

class CompanyController extends Controller
{
	public function index()
	{
		$this->container->get('view')->render('guest/pages/companies.php');
	}
}