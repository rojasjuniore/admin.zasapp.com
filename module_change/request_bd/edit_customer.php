<?php

session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
include('../../common/connect_db.php');
if (isset($_POST['enviar'])) {
    $id = $_POST["id"];
    $empresa = $_POST["empresa"];
    $nombre_cliente = $_POST["nombre_cliente"];
    $apellidos_cliente = $_POST["apellidos_cliente"];
    $email_cliente = $_POST["email_cliente"];
    $cif_nif = $_POST["cif_nif"];
    $pais_cliente = $_POST["pais_cliente"];
    $ciudad_cliente = $_POST["ciudad_cliente"];
    $provicia_cliente = $_POST["provicia_cliente"];
    $codigo_postal = $_POST["codigo_postal"];
    $direccion_cliente = $_POST["direccion_cliente"];
    $telefono_movil_cliente = $_POST["telefono_movil_cliente"];
    $telefono_local_cliente = $_POST["telefono_local_cliente"];

    $consulta = "UPDATE cliente 
              SET 
              empresa='$empresa',
              nombre_cliente='$nombre_cliente', 
              apellidos_cliente='$apellidos_cliente',
              email_cliente='$email_cliente', 
              cif_nif='$cif_nif', 
              pais_cliente='$pais_cliente',
              ciudad_cliente='$ciudad_cliente',
              provicia_cliente='$provicia_cliente',
              codigo_postal='$codigo_postal',
              direccion_cliente='$direccion_cliente',
              telefono_movil_cliente='$telefono_movil_cliente',
              telefono_local_cliente='$telefono_local_cliente'
          WHERE id_cliente='$id' ";
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