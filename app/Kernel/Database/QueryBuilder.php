<?php

namespace App\Kernel\Database;

use App\Kernel\Database\Connection;
use App\Kernel\Database\Entities\Select;
use App\Kernel\Database\Entities\Where;
use App\Kernel\Database\Entities\Create;
use App\Kernel\Database\Entities\Update;
use App\Kernel\Database\Entities\Delete;

class QueryBuilder
{
	private $select;

	private $table;

	private $where;

	private $offset = 0;

	private $limit = null;

	public function __construct()
	{
		$this->select = new Select();
		$this->where = new Where();
	}

	public function select($columns)
	{
		$this->select->setColumns($columns);

		return $this;
	}

	public function addSelect($column)
	{
		$this->select->addColumn($column);

		return $this;
	}

	public function table($table)
	{
		$this->table = $table;

		return $this;
	}

	public function where(...$args)
	{
		$this->where->addCondition(...$args);

		return $this;
	}

	public function whereNull($column)
	{
		$this->where($column, null);

		return $this;
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
		$limit = !is_null($this->limit) ? "LIMIT {$this->offset}, {$this->limit}" : '';

		$query = "{$this->select->build()} FROM `{$this->table}` {$this->where->build()} {$limit}";

		return $this->execute($query, $this->where->getValues());
	}

	public function find($id, $primaryKey = 'id')
	{
		$result = $this->where($primaryKey, $id)->first();
		return empty($result) ? null : $result;
	}

	public function create($data)
	{		
		$create = new Create();
		$create->setTable($this->table);
		$create->setData($data);

		$query = $create->build();
		$values = $create->getValues();

		return $this->execute($query, $values);
	}

	public function update($data)
	{
		$update = new Update();
		$update->setTable($this->table);
		$update->setData($data);

		$query = $update->build().' '.$this->where->build();
		$values = array_merge($update->getValues(), $this->where->getValues());

		$this->execute($query, $values);
	}

	public function delete()
	{
		$delete = new Delete();
		$delete->setTable($this->table);

		$query = $delete->build().' '.$this->where->build();

		$this->execute($query, $this->where->getValues());
	}

	public function exists()
	{
		return $this->count() > 0;
	}

	public function count()
	{
		$this->select->setFunction('count');

		return (int) array_values($this->first())[0];
	}

	public function paginate($perPage, $currentPage)
	{
		$res = [
			'per_page' => $perPage,
			'current_page' => $currentPage,
			'total' => $this->count(),
			'skip' => $perPage*($currentPage - 1)
		];

		$this->select->setFunction(null);

		$res['last_page'] = ceil($res['total'] / $res['per_page']);

		$res['data'] = $this->skip($res['skip'])->take($res['per_page'])->get();

		return $res;
	}

	private function execute($query, $values)
	{
		$connection = new Connection();
		return $connection->execute($query, $values);
	}
}