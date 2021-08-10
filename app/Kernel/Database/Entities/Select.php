<?php

namespace App\Kernel\Database\Entities;

class Select
{
	private $columns = [];

	private $function = null;

	public function hasColumns()
	{
		return !empty($this->columns);
	}

	public function addColumn($column)
	{
		$this->columns[] = $column;
	}

	public function setColumns($columns)
	{
		$this->columns = $columns;
	}

	// min, max, count, avg, sum
	public function setFunction($function)
	{
		$this->function = strtoupper($function);
	}

	public function build()
	{
		return "SELECT {$this->buildFunction($this->buildColumns())}";
	}

	private function buildColumns()
	{
		return $this->hasColumns() ? '`'.implode('`, `', $this->columns).'`' : '*';
	}

	private function buildFunction(string $columns)
	{
		return !$this->function ? $columns : "{$this->function}({$columns})";
	}
}
