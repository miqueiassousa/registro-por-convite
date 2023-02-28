<?php
try {
	$pdo = new PDO("mysql:dbname=controledeusuarios;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}