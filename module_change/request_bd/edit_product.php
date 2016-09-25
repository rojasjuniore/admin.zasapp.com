<?php

session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}

include('../../common/connect_db.php');
if (isset($_POST['enviar'])) {
    $id_producto_mod = $_POST["id_producto_mod"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $plantilla_url = $_POST["plantilla_url"];
    $estado = 'visible';
    $nombre_file = mktime() . '.jpg';

    $consulta = "UPDATE producto 
              SET  titulo='$titulo', 
              descripcion='$descripcion', 
              precio='$precio', 
              imagen='$nombre_file', 
              plantilla_url='$plantilla_url'
          WHERE id_producto='$id_producto_mod' ";
    mysql_query($consulta, $link);
    echo mysql_error($link);
    $original = $_FILES['imagen']['tmp_name'];
    $destino = "../img_upload/$nombre_file";
    move_uploaded_file($original, $destino);
    if ($consulta) {
        echo '<script>alert("Registro Modificado")</script>';
        echo "<script>location.href='../../module_search_result/consult_product.php'</script>";
    } else {
        echo '<script>alert("No Ha sido eliminado su producto productos")</script> ';
        echo mysql_errno($consulta);
    }
}
?>  