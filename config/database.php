<?php

return [
	'host' => $_ENV['DB_HOST'] ?? 'localhost',
	'name' => $_ENV['DB_NAME'],
	'charset' => 'utf8mb4',
	'username' => $_ENV['DB_USERNAME'],
	'password' => $_ENV['DB_PASSWORD']
];