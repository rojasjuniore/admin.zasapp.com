<?php
session_start();
if (@!$_SESSION['nombre_vendedor']) {
    header("Location:index.php");
}
include('../../common/connect_db.php');
if (isset($_POST['enviar'])) {

    $nombre_file = mktime() . '.jpg';
    $codigo_producto = "COD" . $nombre_file;
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $plantilla_url = $_POST["plantilla_url"];
    $estado = 'visible';

    $sql = mysql_query("INSERT INTO producto (codigo_producto, titulo, descripcion, precio ,imagen , plantilla_url, estado) 
                    VALUES ('$codigo_producto', '$titulo', '$descripcion','$precio','$nombre_file','$plantilla_url','$estado')", $link)
    or die("Error al ejecutar la consulta" . mysql_error());;
    $original = $_FILES['imagen']['tmp_name'];
    $destino = "../../img_upload/$nombre_file";
    move_uploaded_file($original, $destino);
    if ($sql) {
        echo '<script>alert("Registro guardado con exito")</script>';
        echo "<script>location.href='../../module_search_result/consult_product.php'</script>";
    } else {
        echo '<script>alert("Error")</script> ';
        echo mysql_errno($reg);
    }
}
?>  