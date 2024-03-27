<!doctype html>
<?php include("cabecera.php"); ?>
<?php include("menu.php"); ?>
<?php require_once('conexion.php'); ?>

<?php
if(isset($_POST['enviar']) && $_POST ['enviar'] == 'enviar'){
$cabecera = "Alejandro Marquez <amarquez@laboratoriodiseno.cl>";
$cabecera .= "Reply-To: ".$row['email']."\n";
$cabecera .= "Cc: al.marquezmiranda@gmail.com\n";
$destinatario="a.marquez@duocuc.cl";
$asunto="Venta de rayitas desde el sitio WEB";
$cuerpo="$_POST[$cuerpo]";
if (mail($destinatario, $asunto, $cuerpo, $cabecera)) {
    echo 'El correo se envió exitosamente';
} else {
    echo 'Error al enviar el correo';
}
}
?>

<h2 class="text-center">Contacto</h2>
<form method="GET" action="contacto.php">
    <div class="container mb-5">
        <div class="row">
            <div class="col col-md-6 mx-auto">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control border border-success border border-success border border-success" id="nombre" placeholder="Ingrese su nombre" name="nombre">
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Email address</label>
                    <input type="email" class="form-control border border-success border border-success" id="correo" placeholder="nombre@apellido.com" name="correo">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control border border-success border border-success" id="telefono" placeholder="Ingrese su telefono" name="telefono">
                </div>

                <div class="mb-3">
                    <label for="asunto" class="form-label">Asunto</label>
                    <input type="text" class="form-control border border-success border border-success" id="asunto" placeholder="Ingrese un asunto" name="asunto">
                </div>

                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control border border-success border border-success" id="mensaje" placeholder="Ingrese un mensaje" rows="3" name="cuerpo"></textarea>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success w-100" value="enviar" name="enviar" id="enviar">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include("pie.php"); ?>