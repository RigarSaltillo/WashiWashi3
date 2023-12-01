<?php
function obtenerempleado(){

    $server="localhost";
    $user="root";
    $pass="";
    $db="washiwaship4m";
      
       $conexion = new mysqli($server, $user, $pass, $db);
       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    $empleados= array();
    try {
    $query = "SELECT ID_EMPLEADO, nombre_empleado FROM empleados";     
    $resultado = $conexion->query($query);

       //Y cheque mi cuarto y cheque mi cama y  nada 
       if (!$resultado) {
        die("Error en la consulta".$conexion->error);

    } else {
          
          while ($fila = $resultado->fetch_assoc()) {
            $empleados[] = $fila;
            
       }
    }
} catch (Exception $e) {
    // Manejar la excepción
    die("Error: " . $e->getMessage());
} finally {
    // Cerrar la conexión en el bloque finally para asegurarse de que se cierre incluso si hay una excepción
    $conexion->close();
}   
    return $empleados;
}
?>