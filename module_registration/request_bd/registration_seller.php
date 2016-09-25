<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
include('../../common/connect_db.php');
if (isset($_POST['enviar'])) {

    $nombre_vendedor = $_POST["nombre_vendedor"];
    $apellidos_vendedor = $_POST["apellidos_vendedor"];
    $email_vendedor = $_POST["email_vendedor"];
    $usuario_vendedor = $_POST["usuario_vendedor"];
    $clave_vendedor = $_POST["clave_vendedor"];
    $comision_vendedor = $_POST["comision_vendedor"];
    $permisos = $_POST["permisos"];
    $reg = mysql_query("INSERT INTO vendedor(nombre_vendedor, 
                                apellidos_vendedor, 
                                email_vendedor, 
                                usuario_vendedor,  
                                clave_vendedor, 
                                comision_vendedor,
                                permisos)    
                        VALUES ('$nombre_vendedor', 
                                '$apellidos_vendedor', 
                                '$email_vendedor',
                                '$usuario_vendedor',
                                '$clave_vendedor',
                                '$comision_vendedor',
                                '$permisos')", $link)
    or die("Error al ejecutar la consulta" . mysql_error());;
    if ($reg) {
        echo '<script>alert("Registro guardado con exito")</script>';
        echo "<script>location.href='../../module_search_result/consult_seller.php'</script>";
    } else {
        echo '<script>alert("Error")</script> ';
        echo mysql_errno($reg);
    }
}
?>  