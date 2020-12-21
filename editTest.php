

<?php

include("conexion.php");
include('includes/header.php');

if(isset($_GET['id'])) {
  $TestCod = $_GET['id'];
  $query0 = "SELECT * FROM test WHERE TesCod = $TestCod";
  $result0 = mysqli_query($conn, $query0);
  if(!$result0) {
    die(" Sentencia query fallida.");
  }
  $area=0;
  while ($row0 = mysqli_fetch_array($result0)){

     $area= $row0['TesAreCod'];
  }


  $query = "SELECT * FROM preguntas WHERE PreTesCod = $TestCod";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die(" Sentencia query fallida.");
  }
}

//-------------------------------------------------SUBIR CAMBIOS-----------------------------------
if (isset($_POST['update'])) {
    $idTest = $_GET['id'];
    
    $queryAux = "SELECT *FROM test where TesCod = '$idTest'  ";
    $resultado=mysqli_query($conn,$queryAux);
    $numPre=0;
    while ($row = mysqli_fetch_array($resultado)) {
      $numPre=$row ['TesNumPre'];     
    }

    if(!$resultado) {
    die("Query Failed----.");
     }


   $_SESSION['message'] = ' -----';
    $_SESSION['message_type'] = '-----';


    $x=1;
    while($x<=$numPre){
      $prNom="pregunta".$x;
      $prCar= "carreraPregunta".$x;

      $preNombre = $_POST[$prNom];
      $preCarrera=$_POST[$prCar];

      $queryPreUp ="UPDATE pregunta set PreNom = '$PreNom' WHERE PreTesCod= $PreCodigoEdit ";

      mysqli_query($conn, $queryPreUp);






    }



    $PreNom = $_POST['Nombre'];
    $PerApe = $_POST['Apellido'];
    $PerEda = $_POST['Edad'];
    $PerCor = $_POST['Correo'];




  $query = "UPDATE pregunta set PreNom = '$PreNom' WHERE PreTesCod= $PreCodigoEdit";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Se han editado los datos ';
  $_SESSION['message_type'] = 'warning';
  header('Location: AdminCrud.php');
}

//---------------------------------------------------------------------------------

  ?>


  <div class="container p-4">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
        <form action="editTest.php?id=<?php echo $TestCod ?> " method="POST">
       
        <?php  
        $i=1;

        while ($row = mysqli_fetch_array($result)){ 
           $preCodigo = $row['PreCod'];
          ?>
            <h5>Pregunta <?php echo $i ?> </h5>

            <div class="form-group">

              <input name="pregunta<?php echo $i ?>" type="text" class="form-control" value="<?php echo $row['PreNom']; ?>"  placeholder="ingrese nueva pregunta">

              <?php 
                  
                  $query2 = "SELECT *FROM carrera where CarAreCod = $area  ";
                  $resultado=mysqli_query($conn,$query2);
                  
                while ($row2 = mysqli_fetch_array($resultado)) { 

                  if($row['PreCarCod'] == $row2 ['CarCod']){


                  ?>  

                     <input type="radio" id="carrera" name="carreraPregunta<?php echo $i ?>" value="<?php echo $row2 ['CarCod']; ?>" checked >
                           <label for="carrera"> <?php echo $row2 ['CarNom'] ?></label><br>  
                     <?php
                 } 

                  else {
                  ?>
                   <input type="radio" id="carrera" name="carreraPregunta<?php echo $i ?>" value="<?php echo $row2 ['CarCod']; ?>">
                           <label for="carrera"> <?php echo $row2 ['CarNom'] ?></label><br>
                     <?php
                    }
               }
               
                $query3 = "SELECT *FROM respuestas where ResPreCod = $preCodigo ";
                $resultado3=mysqli_query($conn,$query3);

                $n=1;

                while ($row3 = mysqli_fetch_array($resultado3)){
           ?>

           <input name="pregunta<?php echo$i?>Respuesta<?php echo$n?>" type="text" class="form-control"  value="<?php echo $row3 ['ResNom']; ?>"placeholder="respuesta<?php echo$n?> -- puntos <?php echo ($n-1) ?>" >
               
           <?php
             $n= $n+1;
             }
             ?>

             </div>
            
            <?php
            
             $i=$i+1;
           } ?>

            <button class="btn-success" name="update"> Editar </button>
          </form>

</div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
