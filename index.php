<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro por convite</title>

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

	if (empty($_SESSION['logado'])) {
		header("Location: login.php");
		exit;
	}

	$email = '';
	$codigo = '';

	$sql = "SELECT email, codigo FROM usuarios WHERE id = '" . addslashes($_SESSION['logado']) . "'";

	$sql = $pdo->query($sql);
	if ($sql->rowCount() > 0) {
		$info = $sql->fetch();
		$email = $info['email'];
		$codigo = $info['codigo'];
	}
	?>

	<h1>Área interna do sistema</h1>
	<hr>
	<p><b>Usúario: </b><?php echo $email; ?> - <a href="sair.php">Sair</a></p>
	<p><b>Link para convidar novo usuario: </b> http://localhost/b7web/php1Intermediario/5registroporconvite/cadastrar.php?codigo=<?php echo $codigo; ?></p>
</div>