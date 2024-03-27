<?php include("cabecera.php"); ?>
<?php include("menu.php"); ?>
<?php require_once('conexion.php'); ?>
<?php
$query = " SELECT * FROM productos WHERE 1";
$resource = $conn->query($query);
$total = $resource->num_rows;


if (isset($_GET['idElm']) && $_GET['idElm'] <> "") {
  $query = "DELETE FROM productos WHERE id='$_GET[idElm]'";
  $conn->query($query);
}
?>



<table class="table table-striped container mb-5">
  <thead class="text-white bg-dark">
    <tr>
      <th class="text-capitalize">id</th>
      <th class="text-capitalize">nombre</th>
      <th class="text-capitalize">codigo</th>
      <th class="text-capitalize">categoria</th>
      <th class="text-capitalize">color</th>
      <th class="text-capitalize">precio</th>
      <th class="text-capitalize">disponibilidad</th>
      <th class="text-capitalize">promocion</th>
      <th class="text-capitalize">fecha</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $resource->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><a class="text-decoration-none text-capitalize" href="producto-admin.php?id=<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></a></td>
        <td>#<?php echo $row['codigo']; ?></td>
        <td><?php echo $row['categoria']; ?></td>
        <td><?php echo $row['colores']; ?></td>
        <td>$<?php echo number_format($row['precio']); ?></td>
        <td><?php echo $row['disponibilidad']; ?></td>
        <td><?php echo $row['promocion'] == "1"; ?></td>
        <td><?php
            $la_fecha = $row['fecha'];
            list($fec, $hor) = explode(' ', $la_fecha);
            list($ano, $mes, $dia) = explode('-', $fec);
            echo "$dia/$mes/$ano";
            ?></td>
        <td widht=1 align="right"><a href="producto-admin.php?id=<?php echo $row['id']; ?>&codigo=<?php echo $row['codigo']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
        <td><a href="index-admin.php?idElm=<?php echo $row['id']; ?>"><i class="fa-solid fa-trash"></i></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<?php require("pie.php"); ?>