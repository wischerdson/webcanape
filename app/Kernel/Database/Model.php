<?php

namespace App\Kernel\Database;

use App\Kernel\Container;
use App\Kernel\Database\QueryBuilder as Builder;

abstract class Model extends Builder
{
	public function __construct()
	{
		$this->table($this->table);
	}

	protected function hasMany($class, $foreign, $primary = 'id')
	{

	}

	protected function belongsTo($class, $foreign, $primary = 'id')
	{

	}
}