<?php
try{
    $server="localhost";
    $user="root";
    $pass="";
    $db="washiwaship4m";
      //Duda
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Flot=$_POST["Admin_flot"];
    $Contrasena=$_POST[];


       $conexion = new mysqli($server, $user, $pass, $db);
       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
       //Agrgamos el empleado pero no le damos coontraseña para que se pueda loguear 
       $query="INSERT INTO EMPLEADOS (ID_ADMIN,CONTRASENA,nombre_empleado,APELLIDO_PA,APELLIDO_MA) VALUES("","","","",'$rolemple')";
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