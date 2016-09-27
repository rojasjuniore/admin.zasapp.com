<?php

session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
include('../../common/connect_db.php');
if (isset($_POST['enviar'])) {
    $empresa = $_POST["empresa"];
    $id_cliente_mod = $_POST["id_cliente_mod"];
    $nombre_cliente = $_POST["nombre_cliente"];
    $apellidos_cliente = $_POST["apellidos_cliente"];
    $nic_cliente = $_POST["nic_cliente"];
    $email_cliente = $_POST["email_cliente"];
    $clave_cliente = $_POST["clave_cliente"];
    $direccion_cliente = $_POST["direccion_cliente"];
    $telefono_movil_cliente = $_POST["telefono_movil_cliente"];
    $telefono_local_cliente = $_POST["telefono_local_cliente"];


    $consulta = "UPDATE cliente 
              SET empresa='empresa',nombre_cliente='$nombre_cliente', 
              apellidos_cliente='$apellidos_cliente', 
              nic_cliente='$nic_cliente', 
              email_cliente='$email_cliente', 
              clave_cliente='$clave_cliente', 
              direccion_cliente='$direccion_cliente',
              
              telefono_movil_cliente='$telefono_movil_cliente',
              telefono_local_cliente='$telefono_local_cliente'
          WHERE id_cliente='$id_cliente_mod' ";
    mysql_query($consulta, $link);
    echo mysql_error($link);
    if ($consulta) {
        echo '<script>alert("Registro Modificado")</script>';
        echo "<script>location.href='../../module_search_result/consult_customers.php'</script>";
    } else {
        echo '<script>alert("No Ha sido eliminado su producto productos")</script> ';
        echo mysql_errno($consulta);
    }

}
?>  