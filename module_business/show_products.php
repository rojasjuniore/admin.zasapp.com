<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
include('../common/_setup.php');

$consulta_productos = "SELECT * FROM producto";
$filas = mysqli_query($cnx, $consulta_productos);
$num_total_registros = mysqli_num_rows($filas);
echo mysqli_error($cnx);

require_once('../common/config.php');
$base_url = BASE_URL;
$url = $base_url . "/module_business/show_products.php";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mostrar Productos </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../main/main.css">
    <link rel="stylesheet" type="../text/css" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
</head>
<header>
    <?php include('../common/menu.php'); ?>
</header>
<body>
<div class="text-center">
    <legend>
        <h1> Mostrar
            <small>Productos</small>
        </h1>
    </legend>
</div>
<div>
    <div class="col-md-6 col-md-offset-3">
        <?php
        //Si hay registros
        if ($num_total_registros > 0) {
            //Limito la busqueda
            $TAMANO_PAGINA = 5;
            $pagina = false;

            //examino la pagina a mostrar y el inicio del module_registration a mostrar
            if (isset($_GET["pagina"]))
                $pagina = $_GET["pagina"];

            if (!$pagina) {
                $inicio = 0;
                $pagina = 1;
            } else {
                $inicio = ($pagina - 1) * $TAMANO_PAGINA;
            }
            echo '<h5>Numero de articulos: ' . $num_total_registros . '</h5>';
            //calculo el total de paginas
            $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
            $consulta = "SELECT imagen, titulo, descripcion, plantilla_url 
                         FROM producto
                         ORDER BY id_producto  
                         DESC LIMIT " . $inicio . "," . $TAMANO_PAGINA;

            $rs = mysqli_query($cnx, $consulta);
            while ($columna = mysqli_fetch_assoc($rs)) {
                echo '<div class="thumbnail">';
                echo "<img src='../img_upload/$columna[imagen]' alt='preview''>";
                echo '<div class="caption">';
                echo "<h3>$columna[titulo]</h3>";
                echo "<p>$columna[descripcion]</p>";
                echo '<p>';
                echo "<a href='$columna[plantilla_url]' target='_blank' class='btn btn-primary espacio-derecha1' role='button'>Demo</a>";
                echo "<a href='#' class='btn btn-default' role='button'>Seleccionar</a>";
                echo '</p>';
                echo '</div>';
                echo "</div>";
            }
            if ($total_paginas > 1) {
                if ($pagina != 1)
                    echo '<a href="../' . $url . '?pagina=' . ($pagina - 1) . '"><img src="../img/izq.gif" border="0"></a>';
                for ($i = 1; $i <= $total_paginas; $i++) {
                    if ($pagina == $i)
                        echo $pagina;
                    else
                        echo '  <a href="../' . $url . '?pagina=' . $i . '">' . $i . '</a>  ';
                }
                if ($pagina != $total_paginas)
                    echo '<a href="' . $url . '?pagina=' . ($pagina + 1) . '"><img src="../img/der.gif" border="0"></a>';
            }
        } ?>
    </div>
</div>
</body>
</html>

