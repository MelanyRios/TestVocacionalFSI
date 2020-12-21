<?php
	require 'database.php';
	$message = '';
	if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['edad'])) {
		$sql= "INSERT INTO persona(PerNom, PerApe, PerEda,PerCor,contrasenia,PerPri) VALUES (:nombre,:apellido,:edad,:email,:password,:pri)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':nombre',$_POST['nombre']);
		$stmt->bindParam(':apellido',$_POST['apellido']);
		$stmt->bindParam(':edad',$_POST['edad']);
		$stmt->bindParam(':email',$_POST['email']);
		$stmt->bindParam(':pri',$_POST['pri']);
		$password=password_hash($_POST['password'],PASSWORD_BCRYPT);
		$stmt->bindParam(':password',$password);
		if($stmt->execute()){
			$message = "Nuevo usuario";
			
		}else{
		$message = "Perdón. Hubo un error al crear usuario";
		}
	}
	else{
		$message = "No entró";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registrarse</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
		<?php require 'partials/header.php' ?>

		<?php if(!empty($message)): ?>
		<p><?php $message ?></p>
		<?php endif; ?>
		<h1>Registro</h1>
			<form action="signup.php" method="post">
				<input type="text" name="nombre" placeholder="Ingrese su Nombre">
				<input type="text" name="apellido" placeholder="Ingrese su Apellido">
				<input type="date" name="edad" placeholder="Ingrese su edad">
				<input type="radio" id="admin" name="pri" value="1" checked>
				<label for="admin">Admin</label>
				<input type="radio" id="usu" name="pri" value="2">
				<label for="usu">Usuario</label>
			<input type="text" name="email" placeholder="Ingrese su email">
			<input type="password" name="password" placeholder="Ingrese su contraseña:">
			<input type="password" name="confirm_password" placeholder="Confirme contraseña:">
			<input type="submit" name="Enviar">

		</form>
	</body>
</html>