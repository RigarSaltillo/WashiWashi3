<?php
function obtenercodigopostal(){

    $server="localhost";
    $user="root";
    $pass="";
    $db="washiwaship4m";
      
       $conexion = new mysqli($server, $user, $pass, $db);
       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    $cod_p= array();
    try {
    $query = "SELECT DISTINCT(COD_POSTAL) FROM direccion";     
    $resultado = $conexion->query($query);

       //Y cheque mi cuarto y cheque mi cama y  nada 
       if (!$resultado) {
        die("Error en la consulta".$conexion->error);

    } else {
          
          while ($fila = $resultado->fetch_assoc()) {
            $cod_p[] = $fila;
            
       }
    }
} catch (Exception $e) {
    // Manejar la excepción
    die("Error: " . $e->getMessage());
} finally {
    // Cerrar la conexión en el bloque finally para asegurarse de que se cierre incluso si hay una excepción
    $conexion->close();
}   
    return $cod_p;
}
?>