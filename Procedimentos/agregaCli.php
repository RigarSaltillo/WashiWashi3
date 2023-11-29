<?php
try{
    $server="localhost";
    $user="root";
    $pass="";
    $db="whashiwaship4n";
      
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $idcli =$_POST["idcliente"];
    $ncliente = $_POST["nombrec"];
       $appc = $_POST["apellidopc"];
       $apmc = $_POST["apellidomc"];
       $telefc =$_POST["telefonoc"];

       $conexion = new mysqli($server, $user, $pass, $db);
       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

       $query="INSERT INTO CLIENTE VALUES('$idcli','$ncliente','$appc','$apmc','$telefc')";
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