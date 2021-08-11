<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\Controller;
use App\Models\Company;
use App\Models\Review;
use Intervention\Image\ImageManagerStatic as Image;

class ReviewController extends Controller
{
	public function index($companyId)
	{
		$this->company = (new Company($this->request))->find($companyId);
		$this->reviews = (new Review($this->request))->where('company_id', $companyId)->paginate(5);

		$this->output('admin/pages/reviews');
	}

	public function create($companyId)
	{
		$this->company = (new Company($this->request))->find($companyId);
		
		$this->output('admin/pages/review-create');
	}

	public function store($companyId)
	{
		$res = (new Review($this->request))->saveNew([
			'photo' => $this->savePhoto(),
			'company_id' => $companyId
		]);

		header("Location: /admin.php?p=company/{$companyId}/reviews");
	}

	public function edit()
	{
		$this->output('admin/pages/review-edit');
	}

	public function update()
	{

	}

	public function publish($companyId, $reviewId)
	{
		(new Review($this->request))->where('id', $reviewId)->update(['published' => 1]);
		header("Location: /admin.php?p=company/{$companyId}/reviews");
	}

	public function delete($companyId, $reviewId)
	{
		(new Review($this->request))->where('id', $reviewId)->delete();

		header("Location: /admin.php?p=company/{$companyId}/reviews");
	}

	private function savePhoto()
	{
		do {
			$fileName = str_shuffle(rand(0, 9999).time().rand(0, 9999)).'.jpg';
			$relativeFilePath = '/images/reviews/'.$fileName;
			$filePath = PUBLIC_DIR.$relativeFilePath;
		} while (file_exists($filePath));

		Image::make($this->request->files['author_photo']['tmp_name'])->encode('jpg', 75)->orientate()->save($filePath);

		return $relativeFilePath;
	}
}