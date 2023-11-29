<?php
try{
    $server="localhost";
    $user="root";
    $pass="";
    $db="whashiwaship4n";
      
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $idEmpleado =$_POST["idEmpleado"];
    $rolemple=$_POST["rolEmpleado"]

       $conexion = new mysqli($server, $user, $pass, $db);
       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

       $query="INSERT INTO EMPLEADOS VALUES('$idEmpleado',"","","","",'$rolemple')";
       $resultado = $conexion->query($query);

       //Y cheque mi cuarto y cheque mi cama y  nada 
       if ($resultado) {
           header("Location: /WashiWashi/Admin_front.php");
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