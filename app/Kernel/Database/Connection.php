<?php

namespace App\Kernel\Database;

use PDO;

class Connection
{
	private $pdo;

	public function __construct()
	{
		$this->connect();
	}

	private function connect()
	{
		$config = require CONFIG_PATH.'/database.php';

		$dsn = "mysql:host={$config['host']};dbname={$config['name']};charset={$config['charset']}";
		$this->pdo = new PDO($dsn, $config['username'], $config['password']);

		return $this;
	}

	public function execute($sql, $values = [])
	{
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($values);

		return $stmt->fetchAll(PDO::FETCH_ASSOC) ?? [];
	}

	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}
}