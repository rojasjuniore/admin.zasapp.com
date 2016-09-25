<?php
session_start();
require("connect_db.php");


$username = $_POST['mail'];
$pass = $_POST['pass'];

$sql2 = mysql_query("SELECT * FROM vendedor WHERE email_vendedor='$username'")
or die("Error al ejecutar la consulta" . mysql_error());;;
if ($f2 = mysql_fetch_array($sql2)) {
    if ($pass == $f2['clave_vendedor']) {
        $_SESSION['id_vendedor'] = $f2['id_vendedor'];
        $_SESSION['nombre_vendedor'] = $f2['nombre_vendedor'];
        echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
        echo "<script>location.href='../homepage.php'</script>";
    }
}
$sql = mysql_query("SELECT * FROM vendedor WHERE email_vendedor='$username'")
or die("Error al ejecutar la consulta" . mysql_error());;;
if ($f = mysql_fetch_array($sql)) {
    if ($pass == $f['clave_vendedor']) {
        $_SESSION['id_vendedor'] = $f['id_vendedor'];
        $_SESSION['nombre_vendedor'] = $f['nombre_vendedor'];
        header("Location: ../homepage.php");
    } else {
        echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
        echo "<script>location.href='../index.php'</script>";
    }
} else {
    echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
    echo "<script>location.href='../index.php'</script>";
}

?>