<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "washiwaship3";

// Crear conexión
$conexion = new mysqli($server, $user, $pass, $db);
try{


// Verificar la conexión
if ($conexion->connect_errno) {
    die("Conexión Fallida: " . $conexion->connect_errno);
} else {
    echo "La conexión se estableció correctamente";

    $query = "SELECT * FROM empleados WHERE NOMBRE = 'Erick'";
    $resultado = $conexion->query($query);

    // Verificar si la consulta se ejecutó correctamente
    if ($resultado === false) {
        echo "Error en la consulta: " . $conexion->error;
    } else {
        // Verificar si hay filas en el resultado
        if ($resultado->num_rows > 0) {
            // Recorrer los resultados
            while ($fila = $resultado->fetch_assoc()) {
                echo "Se encontró a: " . $fila['NOMBRE'];
            }
        } else {
            echo "No se encontraron registros";
        }
    }
}
}
finally{
    if ($conexion) {
        $conexion->close();
        echo "La coneccion se cerro correctamente";
    }
}
?>
