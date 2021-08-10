<?php

namespace App\Models;

use App\Kernel\Database\Model;

class Company extends Model
{
	public $table = 'companies';

	public function saveNew($data)
	{
		return $this->create(array_merge($data, [
			'name' => $this->request->name,
			'description' => $this->request->description
		]));
	}
}
