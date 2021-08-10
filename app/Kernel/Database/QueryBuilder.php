<?php

namespace App\Kernel\Database;

use App\Kernel\Database\Connection;

class QueryBuilder
{
	private $sql = [];

	private $select = '*';

	private $table;

	private $where = [];

	private $offset = 0;

	private $limit = null;

	private $count = false;

	private $values = [];

	private $set = null;

	public function select($fields = '*')
	{
		$this->select = $fields;

		return $this;
	}

	public function table($table)
	{
		$this->table = $table;

		return $this;
	}

	public function where($col, $value, $operator = '=')
	{
		$this->where[] = "`{$col}` {$operator} ?";
		$this->values[] = $value;

		return $this;
	}

	public function orWhere()
	{

	}

	public function whereIn()
	{

	}

	public function whereNotIn()
	{

	}

	public function whereNull()
	{

	}

	public function whereWhen($condition, ...$args)
	{
		if ($condition) {
			$this->where(...$args);
		}

		return $this;
	}

	public function skip($value)
	{
		$this->offset = $value;

		return $this;
	}

	public function take($value)
	{
		$this->limit = $value;

		return $this;
	}

	public function first()
	{
		$result = $this->skip(0)->take(1)->get();

		return array_key_exists(0, $result) ? $result[0] : [];
	}

	public function get()
	{
		$limit = is_null($this->limit) ? "LIMIT {$this->offset}, {$this->limit}" : '';

		$whereQueryResult = '';
		foreach ($this->where as $key => $where) {
			$whereQueryResult .= $whereQueryResult ? " AND {$where}" : "WHERE {$where}";
		}

		$selectQueryResult = $this->count ? "COUNT({$this->select})" : $this->select;
		
		$query = "SELECT {$selectQueryResult} FROM `{$this->table}` {$whereQueryResult} {$limit}";

		return $this->execute($query);
	}

	public function find($id, $primaryKey = 'id')
	{
		$result = $this->where($primaryKey, $id)->first();
		return empty($result) ? null : $result;
	}

	public function update()
	{

	}

	public function create($data)
	{		
		$cols = '';
		$values = '';

		foreach ($data as $key => $value) {
			$ending = next($data) ? ', ' : '';
			$cols .= "`$key`".$ending;
			$values .= "'$value'".$ending;
			$this->values[] = $value;
		}

		$query = "INSERT INTO `{$this->table}` ({$cols}) VALUES ({$values})";

		return $this->execute($query);
	}

	public function set($data)
	{
		$this->set = '';
		foreach ($data as $key => $value) {
			$this->set .= "{$key} = ?, ";
			$this->values[] = $value;
		}
		
		return $this;
	}

	public function exists()
	{
		return $this->count() > 0;
	}

	public function doesntExist()
	{

	}

	public function count()
	{
		$this->count = true;
		return (int) $this->first()["COUNT({$this->select})"];
	}

	public function paginate($perPage, $currentPage)
	{
		$res = [
			'per_page' => $perPage,
			'current_page' => $currentPage,
			'total' => $this->count(),
			'skip' => $perPage*($currentPage - 1)
		];

		$res['last_page'] = ceil($res['total'] / $res['per_page']);
		$this->count = false;

		$res['data'] = $this->skip($res['skip'])->take($res['per_page'])->get();
			
		return $res;
	}

	private function execute($sqlQuery)
	{
		$connection = new Connection();
		return $connection->query($sqlQuery, $this->values);
	}
}