<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro por Convite</title>

	<link rel="stylesheet" href="assets\bootstrap\css\bootstrap.min">

	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/navbar-animation-fix.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

</body>

</html>


<div class="container">
	<?php
	session_start();
	require 'config.php';

	if (!empty($_POST['email'])) {
		$email = addslashes($_POST['email']);
		$senha = md5($_POST['senha']);

		$sql = "SELECT id FROM usuarios WHERE email = '$email' AND senha = '$senha'";

		$sql = $pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$info = $sql->fetch();

			$_SESSION['logado'] = $info['id'];
			header("Location: index.php");
			exit;
		} else {
			echo "Usuário ou senha incorreta!";
		}
	}
	?>

	<form method="POST">
		</br>

		<div class="form-group">
			<h2>Tela de Login</h2>
			<p>Só é possível entrar com login, o <b>CADASTRO</b> só é realizado mediante convite!</p>
			<hr>
			E-mail:<br />
			<input type="email" name="email" /><br /><br />

			Senha:<br />
			<input type="password" name="senha" /><br /><br />

			<input type="submit" value="Entrar" /> <a href="cadastrar.php">Cadastrar</a>
		</div>
	</form>
</div>