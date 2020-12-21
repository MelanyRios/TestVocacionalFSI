<?php

include("conexion.php");

if(isset($_GET['id'])) {
  $PerCod = $_GET['id'];
  $query = "DELETE FROM persona WHERE PerCod = $PerCod";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die(" Sentencia query fallida.");
  }

  $_SESSION['message'] = 'Se ha borrado registro';
  $_SESSION['message_type'] = 'danger';
  header('Location: AdminCrud.php');
}

?>