<?php

namespace App\Kernel\Database\Entities;

class Create
{
	private $table;

	private $keys = [];

	private $values = [];

	public function setTable(string $table)
	{
		$this->table = $table;
	}

	public function setData(array $data)
	{
		$this->keys = array_keys($data);
		$this->values = array_values($data);
	}

	public function getValues()
	{
		return $this->values;
	}

	public function build()
	{
		return "INSERT INTO `{$this->table}` ({$this->buildColumns()}) VALUES ({$this->buildValues()})";
	}

	private function buildColumns()
	{
		return "`".implode("`, `", $this->keys)."`";
	}

	private function buildValues()
	{
		$values = [];
		foreach ($this->keys as $key) {
			$values[] = '?';
		}
		return implode(", ", $values);
	}
}
