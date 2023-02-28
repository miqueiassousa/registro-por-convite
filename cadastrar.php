<?php
session_start();
require 'config.php';

if(!empty($_GET['codigo'])) {
	$codigo = addslashes($_GET['codigo']);

	$sql = "SELECT * FROM usuarios WHERE codigo = '$codigo'";
	$sql = $pdo->query($sql);

	if($sql->rowCount() == 0) {
		header("Location: login.php");
		exit;
	}
} else {
	header("Location: login.php");
	exit;
}

if(!empty($_POST['email'])) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$idade = addslashes($_POST['idade']);
	$senha = md5(addslashes($_POST['senha']));
	

	$sql = "SELECT * FROM usuarios WHERE email = '$email'";
	$sql = $pdo->query($sql);

	if($sql->rowCount() <= 0) {

		$codigo = md5(rand(0,99999).rand(0.99999));
		$sql = "INSERT INTO usuarios (nome, email, senha, idade, codigo) VALUES ('$nome', '$email', '$senha', '$idade', '$codigo')";
		$sql = $pdo->query($sql);

		unset($_SESSION['logado']);

		header("Location: index.php");
		exit;
	}
}
?>

<h3>Cadastrar</h3>

<form method="POST">
	Nome:<br/>
	<input type="text" name="nome" /><br/><br/>

	E-mail:<br/>
	<input type="email" name="email" /><br/><br/>

	Idade:<br/>
	<input type="text" name="idade" /><br/><br/>

	Senha:<br/>
	<input type="password" name="senha" /><br/><br/>

	<input type="submit" value="Cadastrar" />
</form>
