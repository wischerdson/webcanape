<?php

namespace App\Kernel\Database\Entities;

class Where
{
	private $conditions = [];

	private $values = [];

	public function addCondition($column, $value, $operator = '=')
	{
		$this->conditions[] = "`{$column}` {$operator} ?";
		$this->values[] = $value;
	}

	public function getValues()
	{
		return $this->values;
	}

	public function build()
	{
		return empty($this->conditions) ? "" : "WHERE ".implode(' AND ', $this->conditions);
	}
}
