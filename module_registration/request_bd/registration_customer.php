<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
include('../../common/connect_db.php');
require_once('../../common/config.php');
$base_url = BASE_URL;
if (isset($_POST['enviar'])) {

    $nombre_cliente = $_POST["nombre_cliente"];
    $apellidos_cliente = $_POST["apellidos_cliente"];
    $nic_cliente = $_POST["nic_cliente"];
    $email_cliente = $_POST["email_cliente"];
    $clave_cliente = $_POST["clave_cliente"];
    $direccion_cliente = $_POST["direccion_cliente"];
    $pais_cliente = $_POST["pais_cliente"];
    $telefono_movil_cliente = $_POST["telefono_movil_cliente"];
    $telefono_local_cliente = $_POST["telefono_local_cliente"];

    $reg = mysql_query("INSERT INTO cliente
                        (nombre_cliente, apellidos_cliente, nic_cliente,email_cliente, clave_cliente, 
                        direccion_cliente,pais_cliente,telefono_movil_cliente,telefono_local_cliente)    
                        VALUES ('$nombre_cliente','$apellidos_cliente','$nic_cliente','$email_cliente',
                        '$clave_cliente', '$direccion_cliente','$pais_cliente','$telefono_movil_cliente',
                        '$telefono_local_cliente')", $link)
    or die("Error al ejecutar la consulta" . mysql_error());
    if ($reg) {
        echo '<script>alert("Registro guardado con exito")</script>';
        echo "<script>location.href='../../module_search_result/consult_customers.php'</script>";
    } else {
        echo '<script>alert("Error")</script> ';
        echo mysql_errno($reg);
    }
}
?>  