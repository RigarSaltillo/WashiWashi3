<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "washiwaship4m";
$conexion = new mysqli($server, $user, $pass, $db);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$consulta = "SELECT * FROM SERVICIOS";
$resultado = $conexion->query($consulta);

$datos = [];
while ($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}


$resultado->free();
$conexion->close();


echo json_encode($datos);
?>
