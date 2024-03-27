<?php //En el código se indica que si el "id" no se encuentra presente (empty), se redirigirá a index.html para evitar el error.
if (!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: index.php');
}
?>
<?php include("cabecera.php"); ?>
<?php include("menu.php"); ?>
<?php require_once('conexion.php'); ?>
<?php
$query_p = " SELECT * FROM productos WHERE 1 AND codigo='$_GET[codigo]'";
$resource_p = $conn->query($query_p);
$total_p = $resource_p->num_rows;
$row_p = $resource_p->fetch_assoc();
$query_c = " SELECT * FROM compras WHERE 1 AND id='$_GET[id]'";
$resource_c = $conn->query($query_c);
$total_c = $resource_c->num_rows;
$row_c = $resource_c->fetch_assoc();
?>
<div class="container mb-5">
  <div class="row">
    <div class="col-md-5 mb-5">
      <img src="assets/img/<?php echo $row_p['codigo'] ?>.webp" class="img-fluid" alt="<?php echo $row_p['nombre'] ?>">
    </div>

    <div class="col-md-5">
      <h2 class="text-capitalize fs-2"><?php echo $row_p['nombre']; ?></h2>
      <h3 class="fs-5">#<?php echo $row_p['codigo']; ?></h3>
      <blockquote><?php echo $row_p['frase_promocional']; ?></blockquote>
      <p class="fw-semibold"><?php echo $row_p['descripcion']; ?></p>

      <form id="compra" name="compra" method="post" action="boleta.php">
        <strong>$<?php echo number_format($row_p['precio']); ?></strong><br />
        <label for="cantidad">cantidad</label>
        <input name="cantidad" type="text" id="cantidad" value="<?php echo $row_c['cantidad']; ?>" size="3" maxlength="3" />
        <input name="id" type="hidden" id="id" value="<?php echo $row_c['id']; ?>" />
        <input type="submit" name="modificar" id="modificar" value="modificar" />
      </form>
    </div>
    <div class="col-md-2">
      <?php if ($row_p['promocion'] == "1") { ?>
        <img src="assets/img/promo.jpg" alt="promocion" width="99" height="80" />
      <?php } ?>
      <p>
        <?php
        $la_fecha = $row_p['fecha'];
        list($fec, $hor) = explode(' ', $la_fecha);
        list($ano, $mes, $dia) = explode('-', $fec);
        echo "$dia/$mes/$ano";
        ?><br>
        <?php echo $row_p['categoria']; ?><br>
        <?php echo $row_p['colores']; ?>
      </p>
    </div>
  </div>
</div>
<?php include("pie.php"); ?>