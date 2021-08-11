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
			'description' => str_replace("\r\n", "<br>", $this->request->description)
		]));
	}

	public function change($companyId, $data = [])
	{
		$this->where('id', $companyId)->update(array_merge($data, [
			'name' => $this->request->name,
			'description' => str_replace("\r\n", "<br>", $this->request->description)
		]));
	}
}
