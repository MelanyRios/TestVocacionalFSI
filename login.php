<?php include ("conexion.php")?>

<?php include ("includes/header.php")?>


<div class="container p-4" >
	
	<div class="row">
		<div class="col-md-6">
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
				
				<form action="log.php" method="POST">
					
					<div class="form-group">
						<input type="text" name="Correo" class="form-control"
						placeholder="Correo" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="Contrasenia" class="form-control"
						placeholder="Contraseña" autofocus>
					</div>
					<input type="submit" name="save_task" class="btn btn-success btn-block" value="Login">
				</form>

			</div>
		</div>


	</div>
</div>

<?php include ("includes/footer.php")?>