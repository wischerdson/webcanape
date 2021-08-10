<?php

namespace App\Kernel\Database\Entities;

class Delete
{
	private $table;

	public function setTable(string $table)
	{
		$this->table = $table;
	}

	public function build()
	{
		return "DELETE FROM `{$this->table}`";
	}
}
