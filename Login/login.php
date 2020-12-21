<?php
	session_start();

	if(isset($_SESSION['persona_PerCod'])){
	header('Location: /Login');

}
	require 'database.php';
	if(!empty($_POST['email']) && !empty($_POST['password'])){
		$records = $conn->prepare('SELECT PerCod,PerCor,contraseina FROM persona WHERE PerCor=:email');
		$records->bindParam(':email', $_POST['email']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);
		$message='';
		if (!empty($results) && password_verify($_POST['password'], $results['contraseina'])){
			$_SESSION['persona_PerCod']= $results['PerCod'];
			header('Locationn: /Login');
		} else {
		$message='No se pudo iniciar sesión';
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
		<?php require 'partials/header.php'?>
		<h1>Iniciar Sesión</h1>
			<?php if(!empty($message)):?>
			<p><?= $message?></p>

			<?php endif;?>
		<form action="login.php" method="post">
			<input type="text" name="email" placeholder="Ingrese su email">
			<input type="password" name="password" placeholder="Ingrese su contraseña:">
			<input type="submit" name="Enviar">

		</form>
	</body>
</html>