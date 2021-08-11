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
		(new Company($this->request))->saveNew([
			'logo' => $this->savePhoto()
		]);

		header('Location: /admin.php');
	}

	public function edit($companyId)
	{
		$this->company = (new Company($this->request))->find($companyId);
		$this->output('admin/pages/company-edit');
	}
	
	public function update($companyId)
	{
		$data = [];

		if ($this->request->files['logo']['tmp_name']) {
			$data = [ 'logo' => $this->savePhoto() ];
		}

		(new Company($this->request))->change($companyId, $data);

		header("Location: /admin.php?p=company/{$companyId}/edit");
	}

	public function delete($companyId)
	{
		(new Company($this->request))->where('id', $companyId)->delete();

		header("Location: /admin.php");
	}

	private function savePhoto()
	{
		do {
			$fileName = str_shuffle(rand(0, 9999).time().rand(0, 9999)).'.jpg';
			$relativeFilePath = '/images/companies/'.$fileName;
			$filePath = PUBLIC_DIR.$relativeFilePath;
		} while (file_exists($filePath));

		Image::make($this->request->files['logo']['tmp_name'])->encode('jpg', 75)->orientate()->save($filePath);

		return $relativeFilePath;
	}
}