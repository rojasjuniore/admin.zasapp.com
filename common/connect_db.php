<?php
require_once('config.php');
$server = DB_HOSTNAME;
$user = DB_USERNAME;
$pass = DB_PASSWORD;
$DB = DB_DATABASE;
$port = PORT;

//Produccion
//$link = mysql_connect($server, $user, $pass, $port);

//Desarrollo
$link = mysql_connect($server, $user, $pass);

if ($link) {
    mysql_select_db($DB, $link);
}
?>