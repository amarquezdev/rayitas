<?php //En el código se indica que si el "id" no se encuentra presente (empty), se redirigirá a index.html para evitar el error.
if (!isset($_GET['id']) || empty($_GET['id'])) {
  // header('Location: index-admin.php');
}
?>
<?php include("cabecera.php"); ?>
<?php include("menu.php"); ?>
<?php require_once('conexion.php'); ?>


<?php
$query = "SELECT * FROM productos WHERE id=$_GET[id]";
$resource = $conn->query($query);
$total = $resource->num_rows;
$row = $resource->fetch_assoc();
?>

<?php
if (isset($_POST['guardar']) && $_POST['guardar'] == "guardar") {
 echo $q = "UPDATE productos SET 
  nombre = `$_POST[nombre]`
WHERE id = $_GET[id]";
  $conn->query($q);
}
?>

<div class="container mb-5 bg-black p-4 rounded">
  <div class="row">
    <div class="col-md-6 text-center">
      <div class="mb-3">
        <h2 class="text-capitalize fs-2 text-light text-center"><?php echo $row['nombre']; ?></h2>
        <h3 class="fs-5 text-light text-center">#<?php echo $row['codigo']; ?></h3>
        <img src="assets/img/<?php echo $row['codigo'] ?>.webp" class="img-fluid mx-auto" alt="<?php echo $row['nombre'] ?>">
      </div>

      <div class="col-md-8 mx-auto">
        <blockquote class="text-light text-start"><?php echo $row['frase_promocional']; ?></blockquote>
        <p class="fw-semibold text-light text-start"><?php echo $row['descripcion']; ?></p>
      </div>
      <div class="col-md-8 mx-auto text-start text-light">
        <div><?php if ($row['promocion'] == "1") { ?>
            <img src="assets/img/promo.jpg" alt="promocion" width="99" height="80" />
          <?php } ?>
          <p>
            <?php
            $la_fecha = $row['fecha'];
            list($fec, $hor) = explode(' ', $la_fecha);
            list($ano, $mes, $dia) = explode('-', $fec);
            echo "$dia/$mes/$ano";
            ?><br>
            <?php echo $row['categoria']; ?><br>
            <?php echo $row['colores']; ?>
          </p>
        </div>
      </div>
    </div>

    <form class="bg-dark p-4 rounded col-md-6" action="producto-admin.php?id=<?php echo $row['id'] ?>" method="post">
      <div class="form-group mb-3">
        <label for="nombre" class="form-label text-light">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce el nombre" value="<?php echo $row['nombre']; ?>">
      </div>
      <div class="form-group mb-3">
        <label for="codigo" class="form-label text-light">Código:</label>
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Introduce el código" value="<?php echo $row['codigo']; ?>">
      </div>
      <div class="form-group mb-3">
        <label for="frase-promocional" class="form-label text-light">Frase promocional:</label>
        <input type="text" class="form-control" id="frase-promocional" name="frase_promocional" placeholder="Introduce la frase promocional" value="<?php echo $row['frase_promocional']; ?>"">
      </div>
      <div class=" form-group mb-3">
        <label for="descripcion" class="form-label text-light">Descripcion:</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Introduce la descripcion" value="<?php echo $row['descripcion']; ?>">
      </div>
      <div class="form-group mb-3">
        <label for="promocion" class="form-label text-light">Promoción:</label>
        <select class="form-select" id="promocion" name="promocion">
          <option value="<?php echo $disponibilidad; ?>">En promoción</option>
          <option value="<?php echo $nombre; ?>">Sin promoción</option>
        </select>
      </div>
      <div class="form-group mb-3">
        <label for="categoria" class="form-label text-light">Categoría:</label>
        <select class="form-select" id="categoria" name="categoria">
          <option value="<?php echo $categoria; ?>"><?php echo $row['categoria']; ?><br>
          </option>
        </select>
      </div>
      <div class="form-group mb-5">
        <label for="precio" class="form-label text-light">Precio:</label>
        <input type="text" class="form-control" id="precio" name="precio" placeholder="" value="$<?php echo $row['precio']; ?>">
      </div>
      <input type="submit" name="guardar" id="guardar" value="guardar" class="btn btn-warning mb-3 w-100">Guardar cambios</input>
    </form>
  </div>
</div>

</div>
</div>

<?php include("pie.php"); ?>