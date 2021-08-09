<?php

namespace App\Models;

use App\Kernel\Database\Model;

class Company extends Model
{
	public $table = 'companies';

	public function reviews()
	{
		return $this->hasMany(\App\Models\Review::class, 'company_id');
	}
}
