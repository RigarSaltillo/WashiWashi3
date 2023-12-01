<?php
try{
    $server="localhost";
    $user="root";
    $pass="";
    $db="washiwaship4m";
      
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ncliente = $_POST["nombrec"];
       $appc = $_POST["apellidopc"];
       $apmc = $_POST["apellidomc"];
       $telefc =$_POST["telefonoc"];

       $conexion = new mysqli($server, $user, $pass, $db);
       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

       $query="INSERT INTO CLIENTE (NOMBRE2,AP_PATERNO_CLI,AP_MATERNO_CLI,NUMERO) VALUES('$ncliente','$appc','$apmc','$telefc')";
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