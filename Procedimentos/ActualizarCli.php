<?php
try{
    $server="localhost";
    $user="root";
    $pass="";
    $db="washiwaship4m";
      
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cli_s=$_POST["cli_s"];
    $ncliente = $_POST["nombrec"];
       $appc = $_POST["apellidopc"];
       $apmc = $_POST["apellidomc"];
       $telefc =$_POST["telefonoc"];

       $conexion = new mysqli($server, $user, $pass, $db);
       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

       $query="UPDATE CLIENTE  SET NOMBRE2='$ncliente',AP_PATERNO_CLI='$appc',AP_MATERNO_CLI='$apmc',NUMERO='$telefc' WHERE ID_CLIENTE=$cli_s";
       $resultado = $conexion->query($query);

       //Y cheque mi cuarto y cheque mi cama y  nada 
       if ($resultado) {
           header("Location: /WashiWashi3/Admin_front.php");
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