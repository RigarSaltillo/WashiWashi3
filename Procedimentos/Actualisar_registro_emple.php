<?php
try{
    $server="localhost";
    $user="root";
    $pass="";
    $db="washiwaship4m";
      
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $id_emple_a =$_POST["id_emple_a"];
    $nombre_emple = $_POST["nombre_emple"];
       $pasw_emple = $_POST["pasw_emple"];
       $apellido_p = $_POST["Apellido_p"];
       $apellido_m =$_POST["Apellido_ma"];

       $conexion = new mysqli($server, $user, $pass, $db);
       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    
 
    $query = "UPDATE EMPLEADOS SET CONTRASENA='$pasw_emple', NOMBRE_FLOTILLA='$nombre_emple', APELLIDO_PA='$apellido_p', APELLIDO_MA='$apellido_m' WHERE ID_EMPLEADO='$id_emple_a'";     
    $resultado = $conexion->query($query);

       //Y cheque mi cuarto y cheque mi cama y  nada 
       if ($resultado) {
           header("Location: /WashiWashi/Login.php");
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