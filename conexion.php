<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "sistema_ugb";
$port = "8805"; // Tu puerto configurado

$conexion = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>