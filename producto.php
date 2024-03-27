<?php
if (!isset($_SESSION)) session_start();
if (!$_SESSION['user_id']) {
    $_SESSION['volver'] = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
    header("Location: login.php");
}
?>
<?php //En el código se indica que si el "id" no se encuentra presente (empty), se redirigirá a index.html para evitar el error.
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php');
}
?>

<?php include("cabecera.php"); ?>
<?php include("menu.php"); ?>
<?php require_once('conexion.php'); ?>

<?php
$query = " SELECT * FROM productos WHERE 1 AND id=$_GET[id]";
$resource = $conn->query($query);
$total = $resource->num_rows;
$row = $resource->fetch_assoc();
?>

<div class="container mb-5">
    <div class="row">
        <div class="col-md-5 mb-5">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['nombre']; ?></li>
                </ol>
            </nav>
            <img src="assets/img/<?php echo $row['codigo'] ?>.webp" class="img-fluid" alt="<?php echo $row['nombre'] ?>">
        </div>

        <div class="col-md-5">
            <h2 class="text-capitalize fs-2"><?php echo $row['nombre']; ?></h2>
            <h3 class="fs-5">#<?php echo $row['codigo']; ?></h3>
            <blockquote><?php echo $row['frase_promocional']; ?></blockquote>
            <p class="fw-semibold"><?php echo $row['descripcion']; ?></p>

            <form id="compra" name="compra" method="post" action="boleta.php">
                <strong>$<?php echo number_format($row['precio']); ?></strong><br />
                <label for="cantidad">cantidad</label>
                <input name="cantidad" type="number" id="cantidad" value="1" size="3" min="0" maxlength="3" />
                <input name="precio" type="hidden" id="precio" value="<?php echo $row['precio']; ?>" />
                <input name="codigo" type="hidden" id="codigo" value="<?php echo $row['codigo']; ?>" />
                <input name="nombre" type="hidden" id="nombre" value="<?php echo $row['nombre']; ?>" />
                <input name="cliente" type="hidden" id="cliente" value="<?php echo $_SESSION['user_id']; ?>" />
                <input type="submit" name="comprar" id="comprar" value="comprar" />
            </form>
        </div>
        <div class="col-md-2">
            <?php if ($row['promocion'] == "1") { ?>
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
<?php include("pie.php"); ?>