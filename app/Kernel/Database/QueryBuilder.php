<?php

namespace App\Kernel\Database;

use App\Kernel\Database\Connection;

class QueryBuilder
{
	protected $sql = [];

	public $values = [];

	public function __construct()
	{
		$this->sql['count'] = false;
		$this->select()->skip(0);
	}

	public function select($fields = '*')
	{
		$this->sql['select'] = $fields;

		return $this;
	}

	public function table($table)
	{
		$this->sql['table'] = $table;

		return $this;
	}

	public function where($col, $value, $operator = '=')
	{
		$this->sql['where'][] = "`{$col}` {$operator} ?";
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

	public function skip($value)
	{
		$this->sql['offset'] = $value;

		return $this;
	}

	public function take($value)
	{
		$this->sql['limit'] = $value;

		return $this;
	}

	public function first()
	{
		$result = $this->skip(0)->take(1)->get();

		return array_key_exists(0, $result) ? $result[0] : [];
	}

	public function get()
	{
		$limit = isset($this->sql['limit']) ? "LIMIT {$this->sql['offset']}, {$this->sql['limit']}" : '';

		$whereQueryResult = '';
		if (isset($this->sql['where'])) {
			foreach ($this->sql['where'] as $key => $where) {
				$whereQueryResult .= $whereQueryResult ? " AND WHERE {$where}" : "WHERE {$where}";
			}
		}

		$selectQueryResult = $this->sql['count'] ? "COUNT({$this->sql['select']})" : $this->sql['select'];
		
		$query = "SELECT {$selectQueryResult} FROM `{$this->sql['table']}` {$whereQueryResult} {$limit}";

		return $this->raw($query);
	}

	public function find($id, $primaryKey = 'id')
	{
		$result = $this->where($primaryKey, $id)->first();
		return empty($result) ? null : $result;
	}

	public function update()
	{

	}

	public function exists()
	{

	}

	public function doesntExist()
	{

	}

	public function count()
	{
		$this->sql['count'] = true;
		return (int) $this->first()["COUNT({$this->sql['select']})"];
	}

	public function raw($sqlQuery)
	{
		$connection = new Connection();
		return $connection->query($sqlQuery, $this->values);
	}
}