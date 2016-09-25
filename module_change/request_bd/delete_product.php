<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    include('../../common/_setup.php');
    $consulta = ("DELETE FROM producto WHERE id_producto='$id' LIMIT 1");
    mysqli_query($cnx, $consulta);
}
header("Location: ../show_products.php");
?> 
