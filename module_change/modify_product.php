<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}

include('../common/_setup.php');

$id = $_GET['id'];
//echo "$id";
$consulta = ("SELECT id_producto,codigo_producto, titulo, descripcion, precio, imagen, plantilla_url, estado, fecha_creacion
FROM producto WHERE id_producto='$id' LIMIT 1");
$filas = mysqli_query($cnx, $consulta) or die(mysql_error());
$columnas = mysqli_fetch_assoc($filas);
//var_dump($columnas)
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Librerias CSS-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- ***FIN*** Librerias CSSc col-xs-6 inline-block espacio-arriba-->
    <title>Productos</title>
</head>
<header>
    <?php include('../common/menu.php'); ?>
</header>
<body>
<div class="text-center">
    <h1> Modificar
        <small>producto</small>
    </h1>
</div>
<section>
    <div class="">
        <form action="request_bd/edit_product.php" method="post" enctype="multipart/form-data">
            <div class="col-xs-5 inline-block quitar-float center-block">
                <article>

                    <label for="codigo_producto" class="espacio-arriba2">Codigo de Producto</label>
                    <input type="text" class="form-control" name="codigo_producto"
                           value='<?php echo $columnas["codigo_producto"]; ?>' disabled required=""
                           id="codigo_producto">

                    <label for="titulo" class="espacio-arriba2">Titulo</label>
                    <input type="titulo" class="form-control"
                           name="titulo" value='<?php echo $columnas["titulo"]; ?>' required="" id="titulo">

                    <label for="descripcion" class="espacio-arriba2">Descripción</label>
                    <textarea class="form-control" name="descripcion" rows="3" required>
        <?php echo $columnas["descripcion"]; ?></textarea>

                    <label for="precio" class="espacio-arriba2">Precio</label>
                    <input type="precio" class="form-control" name="precio"
                           value=<?php echo $columnas["precio"]; ?>
                           required="" id="precio"
                           placeholder="Ej: #">

                    <label for="ejemplo_archivo_1" class="espacio-arriba2">Adjuntar un archivo</label>
                    <input id="imagen" name="imagen"
                           value=<?php echo $columnas["imagen"]; ?>
                           size="30" type="file"/>

                    <label for="plantilla_url" class="espacio-arriba2">Platilla</label>
                    <input type="plantilla_url" class="form-control" name="plantilla_url"
                           value=<?php echo $columnas["plantilla_url"]; ?>
                           required="" id="plantilla_url"
                           placeholder="Ej: #">

                    <div class="">
                        <article>
                            <h3>Estado</h3>
                            <select multiple class="form-control" name="estado">
                                <option>Seleccione..</option>
                                <option value="true">Visible</option>
                                <option value="false">Oculto</option>
                        </article>

                        <input type="hidden" name="id_producto_mod" value=<?php echo $id; ?>>
                        <div class="espacio-arriba1">

                            <input type="submit" name="enviar" value="Registrar"
                                   class="btn btn-default espacio-derecha1"/>
                            <input type="reset" value="Borrar" class="btn btn-default  espacio-derecha1"/>
                        </div>
                    </div>
        </form>
</body>
</html>




