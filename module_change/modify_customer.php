<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}

include('../common/_setup.php');
$id = $_GET['id'];
//echo "$id";
$consulta = ("SELECT  nombre_cliente, apellidos_cliente,  nic_cliente,  email_cliente,  clave_cliente, direccion_cliente,   
          pais_cliente, telefono_movil_cliente, telefono_local_cliente, fecha_registro_cliente 
          FROM cliente 
          WHERE id_cliente='$id' LIMIT 1");
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
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- ***FIN*** Librerias CSSc col-xs-6 inline-block espacio-arriba-->
    <title>Consultar Vendedor</title>
</head>
<header>
    <?php include('../common/menu.php'); ?>
</header>
<body>
<div class="text-center">
    <h1> Modificar
        <small>cliente</small>
    </h1>
</div>
<section>
    <div class="">
        <form action="request_bd/edit_client.php" method="post" enctype="multipart/form-data">
            <div class="col-xs-5 inline-block quitar-float center-block">
                <article>

                    <label for="nombre_cliente" class="espacio-arriba2">Nombre</label>
                    <input type="text" class="form-control" name="nombre_cliente"
                           value=<?php echo $columnas["nombre_cliente"]; ?>
                           required="">

                    <label for="apellidos_cliente" class="espacio-arriba2">Apellido</label>
                    <input type="text" class="form-control"
                           name="apellidos_cliente" value=<?php echo $columnas["apellidos_cliente"]; ?> required="">

                    <label for="nic_cliente" class="espacio-arriba2">NIC</label>
                    <input type="text" class="form-control"
                           name="nic_cliente" value=<?php echo $columnas["nic_cliente"]; ?> required="">

                    <label for=" email_cliente" class="espacio-arriba2">EMAIL</label>
                    <input type="text" class="form-control"
                           name="email_cliente" value=<?php echo $columnas["email_cliente"]; ?>  required="">

                    <label for=" clave_cliente" class="espacio-arriba2">Clave</label>
                    <input type="password" class="form-control"
                           name="clave_cliente"
                           value=<?php echo $columnas["clave_cliente"]; ?>
                           required="">

                    <label for="direccion_cliente" class="espacio-arriba2">Direccion FIscal</label>
                    <textarea class="form-control" name="direccion_cliente" rows="3" required>
                        <?php echo $columnas["direccion_cliente"]; ?>
                    </textarea>


                    <!--<div>
                    <article>
                    <h3>comision_vendedor</h3>
                    <select multiple class="pais_cliente" name="pais_cliente">
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
                </div>-->

                    <label for="telefono_movil_cliente" class="espacio-arriba2">Movil</label>
                    <input type="text" class="form-control"
                           name="telefono_movil_cliente"
                           value=<?php echo $columnas["telefono_movil_cliente"]; ?>
                           required="">

                    <label for="telefono_local_cliente " class="espacio-arriba2">Local</label>
                    <input type="text" class="form-control"
                           name="telefono_local_cliente"
                           value=<?php echo $columnas["telefono_local_cliente"]; ?>
                           required="">

                    <label for="fecha_registro_cliente" class="espacio-arriba2">Registro</label>
                    <input type="text" class="form-control"
                           name="fecha_registro_cliente"
                           value=<?php echo $columnas["fecha_registro_cliente"]; ?>
                           disabled>


                    <input type="hidden" name="id_cliente_mod" value=<?php echo $id; ?>>
                    <div class="espacio-arriba1">
                        <a href="#">
                            <button type="button" class="btn btn-default espacio-derecha1">Atras</button>
                        </a>
                        <input type="submit" name="enviar" value="Registrar" class="btn btn-default espacio-derecha1"/>
                        <input type="reset" value="Borrar" class="btn btn-default  espacio-derecha1"/>
                    </div>
            </div>
        </form>
</section>
</body>
</html>




