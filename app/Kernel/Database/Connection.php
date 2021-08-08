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
		return $this->pdo->prepare($sql)->execute($values);
	}

	public function query($sql, $values = [])
	{
		$op = $this->pdo->prepare($sql);
		$op->execute($values);

		return $op->fetchAll(PDO::FETCH_ASSOC) ?? [];
	}
}