<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Company;
use App\Models\Review;

class CompanyController extends Controller
{
	public function index()
	{
		$this->companies = (new Company($this->request))->paginate(5);

		$this->output('guest/pages/companies');
	}

	public function show($companyId)
	{
		$this->company = (new Company($this->request))->find($companyId);
		$this->reviews = (new Review($this->request))->getPublished($companyId);

		$this->output('guest/pages/company-details');
	}
}