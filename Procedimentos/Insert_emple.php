<?php
try{
    $server="localhost";
    $user="root";
    $pass="";
    $db="washiwaship4m";
      
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $emple_id = $_POST["emple_id"];
       $comentarios = $_POST["comentario"];
       $fot_evi = $_POST["foto"];

       $conexion = new mysqli($server, $user, $pass, $db);
       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

       $query="INSERT INTO evidencia (ID_EMPLEADO, EVIDENCIA_FOTO, COMENTARIOS) VALUES('$emple_id','$fot_evi','$comentarios')";
       $resultado = $conexion->query($query);

       //Y cheque mi cuarto y cheque mi cama y  nada 
       if ($resultado) {
           header("Location: /WashiWashi3/Empleado_front.php");
       } else {
           echo "Error en la ejecución de la consulta: " . $conexion->error;
       }

   
    }
}catch (Exception $e) {
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