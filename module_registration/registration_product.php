<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Librerias-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Registro Productos</title>
</head>
<header>
    <?php include('../common/menu.php'); ?>
</header>
<body>
<section>
    <div class="text-center">
        <h1> Registro
            <small>de producto</small>
        </h1>
    </div>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <form action="request_bd/registration_product.php" method="post"
                  enctype="multipart/form-data">
                <article>
                    <?php $codigo_producto = mktime(); ?>
                    <label for="codigo_producto" class="espacio-arriba2">Codigo de Producto</label>
                    <input type="text" class="form-control" name="codigo_producto"
                           value='<?php echo $codigo_producto; ?>' required="" id="codigo_producto" disabled>
                    <label for="titulo" class="espacio-arriba2">Titulo</label>
                    <input type="text" class="form-control" name="titulo" required="" id="titulo" required>

                    <label for="descripcion" class="espacio-arriba2">Descripción</label>
                    <textarea class="form-control" name="descripcion" rows="3" required></textarea>

                    <label for="precio" class="espacio-arriba2">Precio</label>
                    <input type="text" class="form-control" name="precio" required="" id="precio" required>

                    <label for="ejemplo_archivo_1" class="espacio-arriba2">Adjuntar un archivo</label>
                    <input id="imagen" name="imagen" size="30" type="file" required/>

                    <label for="plantilla_url" class="espacio-arriba2">URL</label>
                    <input type="text" class="form-control" name="plantilla_url" required="" id="plantilla_url"
                           required>

                    <label for="estado" class="espacio-arriba2">Estado</label>
                    <select class="form-control" name="estado[]" required>
                        <option>Seleccione..</option>
                        <option value="0">Visible</option>
                        <option value="1">Oculto</option>
                    </select>
                    <div class="espacio-arriba1">
                        <input type="submit" name="enviar" value="Registrar" class="btn btn-default espacio-derecha1"/>
                        <input type="reset" value="Borrar" class="btn btn-default  espacio-derecha1"/>
                    </div>
            </form>

        </div>

</body>
</html>





