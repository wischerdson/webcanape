<?php

namespace App\Controllers;

use App\Kernel\Controller;

class HomeController extends Controller
{
	public function index()
	{
		echo "Home";
	}

	public function index1($companyId, $reviewId)
	{
		echo "$companyId $reviewId";
	}
}