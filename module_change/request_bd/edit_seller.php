<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}

include('../../common/connect_db.php');
if (isset($_POST['enviar'])) {
    $id_vendedor_mod = $_POST["id_vendedor_mod"];
    $nombre_vendedor = $_POST["nombre_vendedor"];
    $apellidos_vendedor = $_POST["apellidos_vendedor"];
    $email_vendedor = $_POST["email_vendedor"];
    $usuario_vendedor = $_POST["usuario_vendedor"];
    $clave_vendedor = $_POST["clave_vendedor"];
    $consulta = "UPDATE vendedor 
              SET nombre_vendedor='$nombre_vendedor', 
              apellidos_vendedor='$apellidos_vendedor', 
              email_vendedor='$email_vendedor', 
              usuario_vendedor='$usuario_vendedor', 
              clave_vendedor='$clave_vendedor' 
           WHERE id_vendedor='$id_vendedor_mod' ";
    mysql_query($consulta, $link);
    echo mysql_error($link);
    if ($consulta) {
        echo '<script>alert("Registro Modificado")</script>';
        echo "<script>location.href='../../module_search_result/consult_seller.php'</script>";
    } else {
        echo '<script>alert("No Ha sido eliminado su producto productos")</script> ';
        echo mysql_errno($consulta);
    }

}
?>  