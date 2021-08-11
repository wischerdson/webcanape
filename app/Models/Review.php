<?php

namespace App\Models;

use App\Kernel\Database\Model;

class Review extends Model
{
	public $table = 'reviews';

	public function company()
	{
		return $this->belongsTo(\App\Models\Company::class, 'company_id');
	}

	public function getPublished($companyId = null)
	{
		return $this->whereWhen(!is_null($companyId), 'company_id', $companyId)->
			where('published', 1)->
			paginate(5);
	}

	public function saveNew($data)
	{
		return $this->create(array_merge($data, [
			'author' => $this->request->author,
			'text' => str_replace("\r\n", "<br>", htmlspecialchars($this->request->text))
		]));
	}
}
