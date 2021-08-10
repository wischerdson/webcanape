<?php

namespace App\Kernel\Database;

use App\Kernel\Container;
use App\Kernel\Database\QueryBuilder as Builder;
use App\Kernel\Request\Request;

abstract class Model extends Builder
{
	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
		$this->table($this->table);
	}

	protected function hasMany($class, $foreign, $primary = 'id')
	{

	}

	protected function belongsTo($class, $foreign, $primary = 'id')
	{

	}

	public function paginate($perPage, $_ = null)
	{
		return parent::paginate($perPage, $this->request->input('page', 1));
	}
}