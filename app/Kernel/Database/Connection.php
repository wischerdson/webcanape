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

	public function execute($sql)
	{
		return $this->pdo->prepare($sql)->execute();
	}

	public function query($sql)
	{
		return $this->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
	}
}