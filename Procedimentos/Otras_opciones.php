<?php
try{
    $server="localhost";
    $user="root";
    $pass="";
    $db="washiwaship4m";
      
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_SERVIVIO=$_POST["id_ser"];
    $ESTATUS=$_POST["estatus"];
    $EVIDE=$_POST["foto"];
    $COMENTARIOS=$_POST["comentarios"];

       $conexion = new mysqli($server, $user, $pass, $db);
       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

       $query="INSERT into detalles_servicio (ID_SERVIVIO,ESTATUS, EVIDENCIA_,COMENTARIOS) VALUES ('$ID_SERVIVIO','$ESTATUS', '$EVIDE','$COMENTARIOS')";
       $resultado = $conexion->query($query);

       //Y cheque mi cuarto y cheque mi cama y  nada 
       if ($resultado) {
           header("Location: /WashiWashi3/Otras_opcioines.php");
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