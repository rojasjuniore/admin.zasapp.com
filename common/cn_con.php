<?php
require_once('config.php');
$server = DB_HOSTNAME;
$user = DB_USERNAME;
$pass = DB_PASSWORD;
$DB = DB_DATABASE;
$port = PORT;
//Produccion
//$mysqli = new mysqli($server, $user, $pass, $DB,$port);

//Desarrollo
$mysqli = new mysqli($server, $user, $pass, $DB);
if (mysqli_connect_errno()) {
    echo 'Conexion Fallida : ', mysqli_connect_error();
    exit();
}
?>