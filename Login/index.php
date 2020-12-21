<?php
session_start();

require 'database.php';
if(isset($_SESSION['persona_PerCod'])){
	$records = $conn->prepare('SELECT PerCod, PerCor, contraseina FROM persona WHERE PerCod=:id');
	$records->bindParam(':id',$_SESSION['persona_PerCod']);
	$records->execute();
	$results= $records->fetch(PDO::FETCH_ASSOC);
	$user=null;
	if(!empty($results)){
		$user=$results;

	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Bienvenido a Himalaya</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
		<?php require 'partials/header.php'?>

		<?php if(!empty($user)):?>
		<br>Bienvenido <?= $user['email']?>
		<br>Inició sesión con Éxito
		<a href="logout.php">Logout</a>
		<?php else: ?>
			<h1>Por favor, intentelo otra vez</h1>
		<h1> Por fagor Inicie Sesión o Registrese</h1>

		<a href="login.php">Inicise Sesión</a> o
		<a href="signup.php">Registrese</a>

	</body>
</html>