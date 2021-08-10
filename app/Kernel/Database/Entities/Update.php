<?php

namespace App\Kernel\Database\Entities;

class Update
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
		return "UPDATE `{$this->table}` {$this->buildSet()}";
	}

	private function buildSet()
	{
		$pairs = [];
		foreach ($this->keys as $key) {
			$pairs[] = "`{$key}` = ?";
		}

		return "SET ".implode(', ', $pairs);
	}
}
