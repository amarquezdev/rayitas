<?php
if (!isset($_SESSION)) session_start();
if (!$_SESSION['user_id']) {
    $_SESSION['volver'] = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
    header("Location: login.php");
}
?>

<body>
    <?php include("cabecera.php"); ?>
    <?php include("menu.php"); ?>
    <?php require_once('conexion.php'); ?>
    <?php

    $query = " SELECT * FROM compras WHERE 1 AND cliente='$_SESSION[user_id]' ORDER BY fecha DESC";
    $resource = $conn->query($query);
    $total = $resource->num_rows;

    if (isset($_POST['comprar']) && $_POST['comprar'] == "comprar") {
        $query = "INSERT INTO compras (id,cliente,codigo,nombre, precio,cantidad,fecha) VALUES (NULL,'$_POST[cliente]','$_POST[codigo]','$_POST[nombre]','$_POST[precio]', '$_POST[cantidad]',NOW())";
        $conn->query($query);
        $ID = $conn->insert_id;
    }

    if (isset($_POST['modificar']) && $_POST['modificar'] == "modificar") {
        $query = "UPDATE compras SET cantidad = '$_POST[cantidad]' WHERE `id` = '$_POST[id]'";
        $conn->query($query);
    }

    if (isset($_GET['idElm']) && $_GET['idElm'] <> "") {
        $query = "DELETE FROM compras WHERE id='$_GET[idElm]'";
        $conn->query($query);
    }
    ?>


    <table class="table table-striped container">
        <thead class="text-white bg-success">
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $resource->fetch_assoc()) { ?>
                <tr>
                    <td>Raya <?php echo $row['nombre'] ?></td>
                    <td align="center">$<?php echo number_format($precio = $row['precio']); ?></td>
                    <td align="center"><?php echo $cantidad = $row['cantidad'] ?></td>
                    <td align="right">$<?php echo number_format($sub = $precio * $cantidad);
                                        $subtotal += $sub ?></td>
                    <td widht=1 align="right"><a href="modificar.php?id=<?php echo $row['id']; ?>&codigo=<?php echo $row['codigo']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="boleta.php?idElm=<?php echo $row['id']; ?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            <?php } ?>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>SUBTOTAL</td>
                <td>$<?php echo number_format($subtotal); ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>ENV&Iacute;O</td>
                <td><?php
                    if ($subtotal > 50000) {
                        $envio = 0;
                    } elseif ($subtotal > 25000) {
                        $envio = 2000;
                    } else {
                        $envio = 5000;
                    }
                    $envio;
                    echo '$', number_format($envio);
                    ?> </td>
            </tr>
            <?php if ($subtotal > 50000) { ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="fw-bold text-danger">Descuento 10%</td>
                    <td class="fw-bold text-danger">-$
                        <?php echo number_format($descuento = $subtotal * 0.1); ?></td>
                </tr>
            <?php } //el bloque de acción "{}" afecta todo lo que contiene dentro, en este caso si se cumple que $subtotal > 50000, se mostrará la fila completa de descuento ya que está afectando desde la apertura de un tr hasta su cierre, si estuviera solamente afectando la salida a pantalla de la varible $descuento, con montos menores, seguiría mostrando la fila "descuento 10%" completa pero con ningún valor a su lado en la tabla
            ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>SUB-TOTAL</td>
                <td><?php $subtotalenvio = $subtotal + $envio - $descuento;
                    echo '$', number_format($subtotalenvio = $subtotal + $envio - $descuento);
                    ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>IVA</td>
                <td><?php $iva = $subtotalenvio * .19;
                    echo '$', number_format($iva);
                    ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>TOTAL</td>
                <td><?php $subtotalenvio + $iva;
                    echo '$', number_format($subtotalenvio + $iva);
                    ?></td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <?php include("pie.php"); ?>
    </div>
</body>

</html>