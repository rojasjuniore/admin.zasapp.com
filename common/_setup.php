<?php
require_once('config.php');
$server = DB_HOSTNAME;
$user = DB_USERNAME;
$pass = DB_PASSWORD;
$DB = DB_DATABASE;
$port = PORT;

//Produccion
//$cnx = mysqli_connect($server, $user, $pass, $DB, $port);

//Desarrollo
$cnx = mysqli_connect($server, $user, $pass, $DB);
?>