<?php

namespace App\Controllers;

use App\Kernel\Controller;

class ReviewController extends Controller
{
	public function show($companyId, $reviewId)
	{
		$company = [
			'id' => 1,
			'name' => 'Apple'
		];
		$review = [
			'author' => 'Tim Cook',
			'text' => '    American corporation, manufacturer of personal and tablet computers, audio players, smartphones, software. One of the pioneers in the field of personal computers and modern multitasking operating systems with a graphical interface. It is headquartered in Cupertino, California. Thanks to innovative technologies and aesthetic design, Apple has created a unique reputation in the consumer electronics industry, comparable to a cult. American corporation, manufacturer of personal and tablet computers, audio players, smartphones, software. One of the pioneers in the field of personal computers and modern multitasking operating systems with a graphical interface. It is headquartered in Cupertino, California.   Thanks to innovative   technologies and aesthetic design, Apple has created a unique reputation in the consumer electronics industry, comparable to a cult. American corporation, manufacturer of personal and tablet computers, audio , smartphones, software. One of the pioneers in the field of personal computers and modern multitasking operating systems with a graphical interface. It is headquartered in Cupertino, California. Thanks to innovative technologies and aesthetic design, Apple has created a unique reputation in the consumer electronics industry, comparable to a cult.   American corporation, manufacturer of personal and tablet computers, audio players, smartphones, software. One of the pioneers in the field of personal computers and modern multitasking operating systems with a graphical interface. It is headquartered in Cupertino, California. Thanks to innovative technologies and aesthetic design, Apple has created a unique reputation in the consumer electronics industry, comparable to a cult. American corporation, manufacturer of personal and tablet computers, audio players, smartphones, software. One of the pioneers in the field of personal computers and modern multitasking operating systems with a graphical interface. It is headquartered in Cupertino, California. Thanks to innovative technologies and aesthetic design, Apple has created a unique reputation in the consumer electronics industry, comparable to a cult.',
			'author_photo' => 'https://cdn.arstechnica.net/wp-content/uploads/2019/07/GettyImages-1154966852.jpg'
		];

		$this->container->get('view')->render('guest/pages/review.php', [
			'company' => $company,
			'review' => $review
		]);
	}

	public function create($companyId)
	{
		$company = [
			'id' => 1,
			'name' => 'Apple'
		];
		
		$this->container->get('view')->render('guest/pages/review-create.php', [
			'company' => $company
		]);
	}
}