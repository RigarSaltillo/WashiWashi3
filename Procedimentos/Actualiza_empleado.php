<?php
try{
    $server="localhost";
    $user="root";
    $pass="";
    $db="washiwaship4m";
      
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_emple=$_POST["id_empleado"];
    $id_admin=$_POST["select_admin"];
    $nom_em=$_POST["nom_empleado"];
    $p_ape=$_POST["Ap_pat"];
    $s_ape=$_POST["Ap_mat"];
    $contra_e=$_POST["contra_emp"];

       $conexion = new mysqli($server, $user, $pass, $db);
       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
   
       $query="UPDATE empleados SET ID_ADMIN='$id_admin', CONTRASENA='$contra_e',nombre_empleado='$nom_em',APELLIDO_PA='$p_ape',APELLIDO_MA='$s_ape' where ID_EMPLEADO='$id_emple'";
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