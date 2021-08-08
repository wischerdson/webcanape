<?php

namespace App\Kernel\Database;

use App\Kernel\Database\QueryBuilder;

class Db
{
	public static function __callStatic($name, $args)
	{
		$builder = new QueryBuilder();
		$builder->$name(...$args);

		return $builder;
	}
}