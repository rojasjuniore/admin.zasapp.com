<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
$user = $_SESSION['nombre_vendedor'];
$apellido = $_SESSION['apellidos_vendedor'];

if (empty($id_cliente)) {
    require("../common/connect_db.php");
    $id_cliente = $_GET['id'];
    $query = "SELECT * FROM cliente WHERE id_cliente='$id_cliente'";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        $id_cliente = $row["id_cliente"];
        $empresa = $row['empresa'];
        $nombre_cliente = $row['nombre_cliente'];
        $apellidos_cliente = $row['apellidos_cliente'];
        $nic_cliente = $row['nic_cliente'];
        $email = $row['email_cliente'];
        $clave_cliente = $row['clave_cliente'];
        $direccion_cliente = $row['direccion_cliente'];
        $pais_cliente = $row['pais_cliente'];
        $telefono_movil_cliente = $row['telefono_movil_cliente'];
        $telefono_local_cliente = $row['telefono_local_cliente'];
        $fecha_registro_cliente = $row['fecha_registro_cliente'];
        //print_r($row);
        //die();
    }

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Presupuestos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" content="nofollow">
    <link href="../css/assets/css/bootstrap.css" rel="stylesheet">
    <link href="../css/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="../css/fonts.css">
</head>
<header>
    <?php include('../common/menu.php'); ?>
</header>
<body>
<div class="text-center">
    <legend>
        <h1>
            Crear
            <small>Presupuestos</small>
        </h1>
    </legend>
</div>
<div class="container">
    <p>
    </p>
    <div class="row-fluid">
        <div class="span12" id="content">
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form class="form-horizontal" id="datos_cotizacion">
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label">Vendedor</label>
                                        <div class="controls">
                                            <input type="text" class="input"
                                                   value='<?php echo $user . '-' . $apellido; ?>'
                                                   disabled
                                                   id="user">
                                            <input type="hidden" name="vendedor" id="vendedor"
                                                   value='<?php echo $_SESSION['id_vendedor']; ?>'>
                                            <input type="hidden" name="id_cliente" id="id_cliente"
                                                   value='<?php echo $id_cliente; ?>'>
                                            <input type="hidden" name="email" id="email"
                                                   value='<?php echo $email; ?>'>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Buscar Cliente</label>
                                        <div class="controls">
                                            <a href="../module_search_result/consult_customers.php"
                                               role="button"
                                               class="btn btn-default"
                                               data-toggle="modal"><i
                                                ></i>Buscar Cliente</a>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Empresa</label>
                                        <div class="controls">
                                            <input type="text"
                                                   value='<?php echo $empresa ?>'
                                                   class="input"
                                                   placeholder="Empresa"
                                                   id="empresa">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Atención</label>
                                        <div class="controls">
                                            <input type="text"
                                                   value='<?php echo $nombre_cliente . ' ' . $apellidos_cliente ?>'
                                                   class="input"
                                                   placeholder="Personal de contacto"
                                                   title="Ingresa el nombre y apellidos"
                                                   required placeholder="Atención"
                                                   id="atencion">
                                            <input type="text" class="input-small"
                                                   value='<?php echo $telefono_movil_cliente ?>'
                                                   title="Ingresa el un numero telefonico. incluyendo el guion"
                                                   required
                                                   placeholder="Teléfono"
                                                   maxlength="12"
                                                   id="tel1">
                                            <input type="text" class="input-small"
                                                   value='<?php echo $telefono_local_cliente ?>'
                                                   title="Ingresa el un numero telefonico. incluyendo el guion"
                                                   required
                                                   placeholder="Teléfono"
                                                   maxlength="12"
                                                   id="tel1">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Direccion</label>
                                        <div class="controls">
                                            <textarea class="form-control" name="direccion_cliente"
                                                      id="direccion_cliente" rows="3" required>
                                                    <?php echo trim($direccion_cliente); ?>
                                                    </textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Condiciones de pago</label>
                                        <div class="controls">
                                            <select class="input-medium" required id="condiciones">
                                                <option value="">Condiciones</option>
                                                <option value="Contado">Contado</option>
                                                <option value="Crédito">Crédito</option>
                                                <option value="Crédito 30 días">Crédito 30 días</option>
                                                <option value="Crédito 60 días">Crédito 60 días</option>
                                                <option value="Crédito 90 días">Crédito 90 días</option>
                                            </select>
                                            <select class="input-medium" required id="validez">
                                                <option value="">Validez de oferta</option>
                                                <option value="5 días">5 días</option>
                                                <option value="10 días">10 días</option>
                                                <option value="15 días">15 días</option>
                                                <option value="30 días">30 días</option>
                                                <option value="60 días">60 días</option>
                                            </select>

                                            <input type="text" class="input-medium"
                                                   placeholder="Tiempo de entrega"
                                                   title="Ingresa el tiempo de entrega"
                                                   required
                                                   id="entrega">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Descuento</label>
                                        <div class="controls">
                                            <input type="text" class="input-small"
                                                   value=''
                                                   title="Descuento"
                                                   placeholder="Descuento"
                                                   maxlength="12"
                                                   id="descuento">
                                        </div>
                                    </div>
                        </div>
                        <div class="pull-right">
                            <a href="#myModal" role="button" class="btn" data-toggle="modal"><i
                                    class="icon-plus"></i> Agregar productos</a>
                            <button class="btn btn-default"><i class="icon-print"></i>
                                Enviar
                            </button>
                        </div>
                        </fieldset>
                        </form>
                        <div id="resultados"></div>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="width:900px; margin-left: -450px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel">Buscar productos</h4>
    </div>
    <div class="modal-body">
        <div class="row-fluid">
            <div class="span12">
                <form id="custom-search-form" class="form-search form-horizontal pull-right">
                    <div class="input-append span12">
                        <input type="text" class="search-query" placeholder="Buscar" id="q" name="q"
                               onkeyup="load(1)">
                        <button type="button" class="btn" onclick="load(1)"><i class="icon-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div id="loader"
             style="position: absolute;	text-align: center;	top: 25px;	width: 80%;display:none;"></div>
        <!-- Carga gif animado -->
        <div class="outer_div"></div><!-- Datos ajax Final -->
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    </div>
</div>
<hr>
<div class="footer">
    <p>&copy; <?php echo " 2013-" . date("Y"); ?> All Rights Reserved.</p>
</div>
</div> <!-- /container -->
<!-- javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../css/assets/js/jquery.js"></script>
<script src="../css/assets/js/bootstrap-transition.js"></script>
<script src="../css/assets/js/bootstrap-alert.js"></script>
<script src="../css/assets/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="../js/VentanaCentrada.js"></script>
<script>
    $(document).ready(function () {
        load(1);
    });

    function load(page) {
        //var mes= $("#mes").val();
        var q = $("#q").val();
        $("#loader").fadeIn('slow');
        $.ajax({
            url: '../load_ajax/productos_cotizacion.php?action=ajax&page=' + page + '&q=' + q,
            beforeSend: function (objeto) {
                $('#loader').html('<img src="../img/ajax-loader.gif"> Cargando...');
            },
            success: function (data) {
                $(".outer_div").html(data).fadeIn('slow');
                $('#loader').html('');

            }
        })
    }
</script>


<script>

    function agregar(id) {
        var precio_venta = document.getElementById('precio_venta_' + id).value;
        var cantidad = document.getElementById('cantidad_' + id).value;
        //Inicia validacion
        if (isNaN(cantidad)) {
            alert('Esto no es un numero');
            document.getElementById('cantidad_' + id).focus();
            return false;
        }
        if (isNaN(precio_venta)) {
            alert('Esto no es un numero');
            document.getElementById('precio_venta_' + id).focus();
            return false;
        }
        //Fin validacion

        $.ajax({
            type: "POST",
            url: "../load_ajax/add_prod_cot.php",
            data: "id=" + id + "&precio_venta=" + precio_venta + "&cantidad=" + cantidad,
            beforeSend: function (objeto) {
                $("#resultados").html("Mensaje: Cargando...");
            },
            success: function (datos) {
                $("#resultados").html(datos);
            }
        });
    }

    function eliminar(id) {

        $.ajax({
            type: "GET",
            url: "../load_ajax/add_prod_cot.php",
            data: "id=" + id,
            beforeSend: function (objeto) {
                $("#resultados").html("Mensaje: Cargando...");
            },
            success: function (datos) {
                $("#resultados").html(datos);
            }
        });

    }

    $("#datos_cotizacion").submit(function () {
        var atencion = $("#atencion").val();
        var tel1 = $("#tel1").val();
        var empresa = $("#empresa").val();
        var direccion_cliente = $("#direccion_cliente").val();
        var tel2 = $("#tel2").val();
        var descuento = $("#descuento").val();
        var email = $("#email").val();
        var condiciones = $("#condiciones").val();
        var validez = $("#validez").val();
        var entrega = $("#entrega").val();
        var vendedor = $("#vendedor").val();
        VentanaCentrada('../common/reportes_pdf/cotizaciones_pdf.php?atencion=' + atencion + '&tel1=' + tel1 +
            '&empresa=' + empresa + '&direccion_cliente=' + direccion_cliente + '&tel2=' + tel2 + '&email=' + email
            + '&condiciones=' + condiciones + '&validez=' + validez + '&entrega=' + entrega + '&vendedor=' + vendedor
            + '&id_cliente=' + id_cliente + '&id_cliente=' + id_cliente + '&descuento=' + descuento, 'Cotizacion', '',
            '700', '700', 'true');
    });
</script>
</body>
</html>



