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
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <title>Regitro Vendedor</title>
</head>
<header>
    <?php include('../common/menu.php'); ?>
</header>
<body>
<div class="text-center">
    <h1> Registro
        <small>de Vendedor</small>
    </h1>
</div>
<section>
    <div class="">
        <form action="request_bd/registration_seller.php" method="post">
            <div class="col-xs-5 inline-block quitar-float center-block">
                <article>
                    <label for="nombres_vendedor" class="espacio-arriba2">Nombres</label>
                    <input type="text" class="form-control" name="nombre_vendedor" required=""
                           id="nombres_vendedor">

                    <label for="Apelidos_vendedor" class="espacio-arriba2">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos_vendedor" required=""
                           id="Apelidos_vendedor">

                    <label for="email_vendedor" class="espacio-arriba2">Email</label>
                    <input type="email" class="form-control" name="email_vendedor" required=""
                           id="Email_vendedor">

                    <label for="email_vendedor" class="espacio-arriba2">Usuario</label>
                    <input type="text" class="form-control" name="usuario_vendedor" required=""
                           id="Email_vendedor">

                    <label for="descripción" class="espacio-arriba2">Clave</label>
                    <input type="password" class="form-control" name="clave_vendedor" required=""
                           id="Email_vendedor">
                    <div>
                        <label for="estado" class="espacio-arriba2">Comision</label>
                        <select multiple class="form-control" name="comision_vendedor">
                            <option>Seleccione..</option>
                            <option value="10">10%</option>
                            <option value="20">20%</option>
                            <option value="30">30%</option>
                            <option value="30">40%</option>
                            <option value="40">50%</option>
                            <option value="50">60%</option>
                            <option value="70">70%</option>
                            <option value="80">80%</option>
                            <option value="90">90%</option>
                            <option value="100">100%</option>
                        </select>
                    </div>
                    <div>
                        <label for="estado" class="espacio-arriba2">Permiso</label>
                        <select multiple class="form-control" name="permisos">
                            <option>Seleccione..</option>
                            <option value="admin">Administrador</option>
                            <option value="basico">Basico</option>
                        </select>
                    </div>
                </article>

                <div class="espacio-arriba1">
                    <a href="principal.php">
                        <button type="button" class="btn btn-default espacio-derecha1">Atras</button>
                    </a>
                    <input type="submit" name="enviar" value="Registrar" class="btn btn-default espacio-derecha1"/>
                    <input type="reset" value="Borrar" class="btn btn-default  espacio-derecha1"/>
                </div>
            </div>
        </form>
</body>
</html>





