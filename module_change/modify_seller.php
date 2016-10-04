<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}

include('../common/_setup.php');

$id = $_GET['id'];
$consulta = ("SELECT id_vendedor, nombre_vendedor, apellidos_vendedor, email_vendedor, usuario_vendedor, clave_vendedor,  comision_vendedor, permisos, fecha_registro_vendedor FROM vendedor WHERE id_vendedor='$id' LIMIT 1");
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
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <!-- ***FIN*** Librerias CSSc col-xs-6 inline-block espacio-arriba-->
    <title>Consultar Vendedor</title>
</head>
<header>
    <?php include('../common/menu.php'); ?>
</header>
<body>
<div class="text-center">
    <h1> Modificar
        <small>Vendedor</small>
    </h1>
</div>
<div class="container">
    <div class="col-md-6 col-md-offset-3">

        <form action="request_bd/edit_seller.php" method="post" enctype="multipart/form-data">
            <article>
                <label for="codigo_producto" class="espacio-arriba2">ID</label>
                <input type="text" class="form-control"
                       name="id_vendedor"
                       value="<?php echo $columnas["id_vendedor"]; ?>"
                       disabled
                       id="id_vendedor"
                       placeholder="Ej: #">

                <label for="titulo" class="espacio-arriba2">Nombre</label>
                <input type="titulo" class="form-control"
                       name="nombre_vendedor"
                       value="<?php echo $columnas["nombre_vendedor"]; ?>"
                       required
                       id="nombre_vendedor"
                       placeholder="Ej: #">

                <label for="apellidos_vendedor" class="espacio-arriba2">Apellidos</label>
                <input type="apellidos_vendedor"
                       class="form-control"
                       name="apellidos_vendedor"
                       value="<?php echo $columnas["apellidos_vendedor"]; ?>"
                       required
                       id="apellidos_vendedor"
                       placeholder="Ej: #">

                <label for="email_vendedor" class="espacio-arriba2">Email</label>
                <input type="email_vendedor" class="form-control" name="email_vendedor"
                       value="<?php echo $columnas["email_vendedor"]; ?>"
                       required
                       id="email_vendedor"
                       placeholder="Ej: #">

                <label for="usuario_vendedor" class="espacio-arriba2">Usuario</label>
                <input type="usuario_vendedor" class="form-control" name="usuario_vendedor"
                       value="<?php echo $columnas["usuario_vendedor"]; ?>"
                       required
                       id="usuario_vendedor"
                       placeholder="Ej: #">

                <label for=" clave_vendedor" class="espacio-arriba2">Clave</label>
                <input type="password" class="form-control" name="clave_vendedor"
                       value="<?php echo $columnas["clave_vendedor"]; ?>"
                       required id="clave_vendedor"
                       placeholder="Ej: #">
                <div>
                    <article>
                        <h3>comision_vendedor</h3>
                        <select multiple class="form-control" name="comision_vendedor" required>
                            <option>Seleccione..</option>
                            <option value="10">10%</option>
                            <option value="20">20%</option>
                            <option value="30">30%</option>
                            <option value="40">40%</option>
                            <option value="50">50%</option>
                            <option value="60">60%</option>
                            <option value="70">70%</option>
                            <option value="80">80%</option>
                            <option value="90">90%</option>
                            <option value="100">100%</option>
                    </article>
                </div>
                <input type="hidden" name="id_vendedor_mod" value=<?php echo $id; ?>>
                <div class="espacio-arriba1">
                    <input type="submit" name="enviar" value="Registrar" class="btn btn-default espacio-derecha1"/>
                    <input type="reset" value="Borrar" class="btn btn-default  espacio-derecha1"/>
                </div>
    </div>
    </form>
</div>
</body>
</html>




