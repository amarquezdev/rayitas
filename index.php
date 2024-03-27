<?php include("cabecera.php");?>
<?php include("menu.php");?>
<?php require_once('conexion.php');?>
<?php
$max = 6;
$pag = 0;
if (isset($_GET['pag']) && $_GET['pag'] <> "") {
  $pag = $_GET['pag'];
}
$inicio = $pag * $max;

$query = "SELECT id, codigo, nombre, frase_promocional, precio FROM productos WHERE nombre LIKE '%" . $_GET['busqueda'] . "%' ORDER BY fecha DESC";
$query_limit = $query . " LIMIT $inicio,$max";
$resource = $conn->query($query_limit);

if (isset($_GET['total'])) {
  $total = $_GET['total'];
} else {
  $resource_total = $conn->query($query);
  $total = $resource_total->num_rows;
}
$total_pag = ceil($total / $max) - 1;
?>

<?php 
if(isset($_GET['enviar'])) {
  $busqueda = $_GET['busqueda'];

  $consulta = $conn->query("SELECT id, codigo, nombre, frase_promocional, precio FROM productos WHERE nombre LIKE '%$busqueda%'");
  while ($row = $consulta->fetch_array()){
    echo $row['id, codigo, nombre, frase_promocional, precio'];
  }
}
?>


<nav>
  <ul class="pagination justify-content-center mb-5">
    <?php if ($pag - 1 >= 0) { ?>
      <li class="page-item previous "> <a href="index.php?pag=<?php echo $pag - 1 ?>&total=<?php echo $total ?>" class="page-link">&larr; Anterior</a> </li>
    <?php } ?>
    <li class="page-item"> <a class="page-link"><?php echo ($inicio + 1) ?> a <?php echo min($inicio + $max, $total) ?> de <?php echo $total ?> </a> </li>
    <?php if ($pag + 1 <= $total_pag) { ?>
      <li>
      <li class="page-item next" style="float:right"> <a href="index.php?pag=<?php echo $pag + 1 ?>&total=<?php echo $total ?>" class="page-link">Siguiente &rarr;</a> </li>
    <?php } ?>
  </ul>
</nav>


<div class="container">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-5 mb-5">
    <?php if ($total) { ?>
      <?php while ($row = $resource->fetch_assoc()) { ?>
        <div class="col col-md-6 col-lg-4">

          <a href="producto.php?id=<?php echo $row['id'] ?>"><?php echo $row[''] ?><div class="card shadow" style="border: none; margin: 0;"><img src="assets/img/<?php echo $row['codigo'] ?>.webp" class="img-fluid w-100 style=" alt="<?php echo $row['nombre'] ?>">
              <div class="card-body">
                <p class="card-text">
                  <a class="text-decoration-none text-capitalize" href="login.php?id=<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></a><br>
                  <?php echo $row['frase_promocional'] ?>.
                <div class="fw-normal text-success fs-5">$<?php echo number_format($row['precio']) ?></div>
                </p>
          </a>
          <div class="text-center">
          </div>
        </div>
  </div>
</div>
<?php } ?>
<?php  } else { ?>
  <p class="error"> No hay resultados para su consulta </p>
<?php } ?>
</div>
<ul class="pagination justify-content-center mb-5">
  <?php if ($pag - 1 >= 0) { ?>
    <li class="page-item previous "> <a href="index.php?pag=<?php echo $pag - 1 ?>&total=<?php echo $total ?>" class="page-link">&larr; Anterior</a> </li>
  <?php } ?>
  <li class="page-item"> <a class="page-link"><?php echo ($inicio + 1) ?> a <?php echo min($inicio + $max, $total) ?> de <?php echo $total ?> </a> </li>
  <?php if ($pag + 1 <= $total_pag) { ?>
    <li>
    <li class="page-item next" style="float:right"> <a href="index.php?pag=<?php echo $pag + 1 ?>&total=<?php echo $total ?>" class="page-link">Siguiente &rarr;</a> </li>
  <?php } ?>
</ul>
</div>

<?php include("pie.php"); ?>