<?php
$server="localhost";
$user="root";
$pass="1234";
$db="washiwashi";
try {
    // Crear conexión
    $conexion = new mysqli($server, $user, $pass, $db);
    // Verificar la conexión
    if ($conexion-> connect_errno){
        die("Coneccion Fallida". $conexion-> connect_errno);
        }else{
   echo "La coneccion se establecio correctamente";

   $query = "SELECT * FROM `empleados` WHERE NOMBRE = 'Erick'";
   $resultado = $conexion->query($query);
   
   if ($resultado) {
    // Verificar si hay filas en el resultado
    if ($resultado->num_rows > 0) {
        // Recorrer los resultados
        while ($fila = $resultado->fetch_assoc()) {
            echo "Se encontró a: " . $fila['Nombre'];
        }
    } else {
        echo "No se encontraron registros";
    }
} else {
    echo "Error en la consulta: " . $conexion->error;
}
   
        }

} catch (Exception $e) {
    // Manejar la excepción
    echo "Error: " . $e->getMessage();
} finally {
    // Cerrar la conexión en el bloque finally para asegurarse de que se cierre incluso si hay una excepción
    if ($conexion) {
        $conexion->close();
        echo "La coneccion se cerro correctamente";
    }
}
?>