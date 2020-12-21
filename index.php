<?php include ("conexion.php")?>

<?php include ("includes/header.php")?>

<div class="container p-4">
	
	<div class="row">
		<div class="col-md-4">
			<?php if (isset($_SESSION['message'])){?>
				<div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                </div>
			<?php session_unset();
		    } ?>
			<div class="card card-body">
				<form action="save.php" method="POST">
					<div class="form-group">
						<input type="text" name="Codigo" class="form-control"
						placeholder="Codigo" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="Nombre" class="form-control"
						placeholder="Nombre" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="Apellido" class="form-control"
						placeholder="Apellido" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="Edad" class="form-control"
						placeholder="Edad" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="Correo" class="form-control"
						placeholder="Correo" autofocus>
					</div>
					<input type="submit" name="save_task" class="btn btn-success btn-block" value="Guardar">
				</form>

			</div>
		</div>
		<div class="col-md-8">
			<table class="table table-borbered">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Edad</th>
						<th>Correo Electronico</th>
						<th>Acciones</th>

					</tr>
				</thead>
				<tbody>
					<?php 
					$query = "SELECT *FROM persona ";
					$result=mysqli_query($conn,$query);
					while ($row = mysqli_fetch_array($result)) { ?>	
						<tr>
						   <td><?php echo $row ['PerCod'] ?></td>
						   <td><?php echo $row ['PerNom'] ?></td>
						   <td><?php echo $row ['PerApe'] ?></td>
						   <td><?php echo $row ['PerEda'] ?></td>
						   <td><?php echo $row ['PerCor'] ?></td>
						   <td><a href="edit.php?id=<?php echo $row['PerCod']?>">Editar </a>
						   	   <a href="delete.php?id=<?php echo $row['PerCod']?>">Eliminar </a>

						   </td>

						</tr>


					<?php
					}
					 ?>
				</tbody>
				
			</table>
		</div>


	</div>
</div>

<?php include ("includes/footer.php")?>