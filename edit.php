<?php

include("conexion.php");

if(isset($_GET['id'])) {
  $PerCod = $_GET['id'];
  $query = "SELECT * FROM persona WHERE PerCod = $PerCod";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die(" Sentencia query fallida.");
  }
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $PerNom = $row['PerNom'];
    $PerApe = $row['PerApe'];
    $PerEda = $row['PerEda'];
    $PerCor = $row['PerCor'];
  }

  if (isset($_POST['update'])) {
    $PerCod = $_GET['id'];
    $PerNom = $_POST['Nombre'];
    $PerApe = $_POST['Apellido'];
    $PerEda = $_POST['Edad'];
    $PerCor = $_POST['Correo'];

  $query = "UPDATE persona set PerNom = '$PerNom', PerApe = '$PerApe', PerEda = '$PerEda', PerCor = '$PerCor' WHERE PerCod=$PerCod";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Se han editado los datos ';
  $_SESSION['message_type'] = 'warning';
  header('Location: AdminCrud.php');
}

}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $PerNom; ?>" placeholder="Update Nombre">
        </div>
        <div class="form-group">
          <input name="Apellido" type="text" class="form-control" value="<?php echo $PerApe; ?>" placeholder="Update Apellido">
        </div>
        <div class="form-group">
          <input name="Edad" type="text" class="form-control" value="<?php echo $PerEda; ?>" placeholder="Update Edad">
        </div>
        <div class="form-group">
          <input name="Correo" type="text" class="form-control" value="<?php echo $PerCor; ?>" placeholder="Update Correo">
        </div>
        
        <button class="btn-success" name="update">
          Editar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

