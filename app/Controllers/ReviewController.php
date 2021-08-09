<?php

namespace App\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use App\Kernel\Controller;
use App\Models\Company;
use App\Models\Review;

class ReviewController extends Controller
{
	public function show($companyId, $reviewId)
	{
		$this->company = (new Company)->find($companyId);
		$this->review = (new Review)->find($reviewId);

		$this->output('guest/pages/review');
	}

	public function create($companyId)
	{
		$this->company = (new Company)->find($companyId);
		
		$this->output('guest/pages/review-create');
	}

	public function store($companyId)
	{
		do {
			$fileName = str_shuffle(rand(0, 9999).time().rand(0, 9999)).'.jpg';
			$filePath = PUBLIC_DIR.'/images/reviews/'.$fileName;
		} while (file_exists($filePath));

		Image::make($this->request->files['author_photo']['tmp_name'])->encode('jpg', 75)->orientate()->save($filePath);

		(new Review)->create([
			'author' => $this->request->author,
			'photo' => "/images/reviews/$fileName",
			'text' => $this->request->text,
			'company_id' => $companyId,
		]);

		header('Location: /?p=company/'.$companyId);
	}
}