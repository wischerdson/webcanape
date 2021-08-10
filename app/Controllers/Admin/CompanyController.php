<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\Controller;
use App\Models\Company;
use Intervention\Image\ImageManagerStatic as Image;

class CompanyController extends Controller
{
	public function index()
	{
		$this->companies = (new Company($this->request))->paginate(5);

		$this->output('admin/pages/companies');
	}

	public function create()
	{
		$this->output('admin/pages/company-create');
	}

	public function store()
	{
		do {
			$fileName = str_shuffle(rand(0, 9999).time().rand(0, 9999)).'.jpg';
			$filePath = PUBLIC_DIR.'/images/companies/'.$fileName;
		} while (file_exists($filePath));

		Image::make($this->request->files['logo']['tmp_name'])->encode('jpg', 75)->orientate()->save($filePath);

		$res = (new Company($this->request))->saveNew([
			'logo' => "/images/companies/$fileName"
		]);

		header('Location: /admin.php');
	}

	public function edit($companyId)
	{
		$this->company = (new Company($this->request))->find($companyId);
		$this->output('admin/pages/company-edit');
	}
	
	public function update()
	{
		// UPDATE `reviews` SET `author` = '1dasdas', `photo` = '1asd', `text` = 'a1sdasd' WHERE `reviews`.`id` = 2;
		// UPDATE `companies` SET `name` = '?', `logo` = '?' WHERE `company_id` = '?'
	}
}