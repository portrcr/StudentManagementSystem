<?php
	$host = "localhost";
	$dbname = "u473058213_student_db";
	$username = "u473058213_smgmts";
	$password = "M;bc*m;%9K3%P)v";

	try {
		$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
			PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES		=> false,
		]);
	}	catch(PDOException $e) {
		die("Database connection failed: " . $e->getMessage());
	}
	