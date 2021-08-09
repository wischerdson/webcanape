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
}
