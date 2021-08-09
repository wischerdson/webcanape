<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Models\Company;
use App\Models\Review;

class CompanyController extends Controller
{
	public function index()
	{
		$this->companies = (new Company)->paginate(5, $this->request->input('page', 1));

		$this->output('guest/pages/companies');
	}

	public function show($companyId)
	{
		$this->company = (new Company)->find($companyId);
		$this->reviews = (new Review)->where('company_id', $this->company['id'])
			->where('published', 1)
			->paginate(5, $this->request->input('page', 1));

		$this->output('guest/pages/company-details');
	}
}