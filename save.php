<?php

include('conexion.php');

if (isset($_POST['save_task'])) {
 
  $Nombre = $_POST['Nombre'];
  $Apellido = $_POST['Apellido'];
  $Edad = $_POST['Edad'];
  $Correo = $_POST['Correo'];

  $query = "INSERT INTO persona(PerCod,PerNom,PerApe,PerEda,PerCor ) VALUES (NULL, '$Nombre', '$Apellido', '$Edad', '$Correo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed----.");
  }

  $_SESSION['message'] = 'Usuario Guardado';
  $_SESSION['message_type'] = 'success';
  header('Location: AdminCrud.php');


}

?>