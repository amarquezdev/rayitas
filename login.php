<!doctype html>
<?php include("cabecera.php");?>
<?php include("menu.php");?>
<?php require_once('conexion.php');?>

<?php if(!isset($_SESSION))session_start();?>
<?php
	if((isset($_POST['usuario']) && $_POST['usuario']<>"") && (isset($_POST['clave']) && $_POST['clave']<>"") ){
		$query="SELECT * FROM registros WHERE 1 AND usuario='$_POST[usuario]' AND clave='$_POST[clave]'";
		$resource=$conn->query($query);
		if($t=$resource->num_rows){
		$row=$resource->fetch_assoc();
		$_SESSION['user_id']=$row['id'];
		$_SESSION['nombre']=$row['nombre'];
		$_SESSION['email']=$row['email'];
		$_SESSION['telefono']=$row['telefono'];
		$_SESSION['pais']=$row['pais'];
		$_SESSION['direccion']=$row['direccion'];

		$volver=($_SESSION['volver'])?$_SESSION['volver']:"index.php";
	header("Location: ".$volver);
	} else {
		$error="Usuario/Clave no registrados";
	}
}
?>
<?php if($error){?>
<div class="alert alert-dismissible alert-danger" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<div><?php echo $error;?></div>
</div> 
<?php }?>

<div class="container mt-5 mb-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div>
						<h4 class="mt-3 text-center text-dark">Iniciar Sesión</h4>
					</div>
					<div class="card-body">
						<form action="" class="container" method="post">
							<div class="form-group mb-3">
								<label for="username">Nombre de Usuario</label>
								<input type="text" name="usuario" id="usuario" class="form-control border border-success">
							</div>
							<div class="form-group mb-3">
								<label for="password">Contraseña</label>
								<input type="password" name="clave" id="clave" class="form-control border border-success">
							</div>
							<button type="submit" name="enviar" value="enviar" id="enviar" class="btn btn-success w-100">Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include("pie.php"); ?>