<?php
try{
    $server="localhost";
    $user="root";
    $pass="";
    $db="whashiwaship4n";
      
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $id_dir=$_POST["id_direccion"];
     $est_di=$_POST["estado_di"];
     $muni_di=$_POST["mun_di"];
     $calle_di=$_POST["calle_di"];
     $nui_di=$_POST["noi_di"];
     $nue_di=$_POST["noe_di"];
     //Las variables de el servicio
     $id_s=$_POST["id_s"];
     $fecha_s=$_POST["fecha_s"];
     $Emple_s=$_POST["emple_s"];
     $dura_s=$_POST["dura_s"]; 
     $cos_s=$_POST["cos_s"];
     //Datos del cliente
     $id_cli_s=$_POST["id_cli_ser"];

       $conexion = new mysqli($server, $user, $pass, $db);
       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    $query="INSERT INTO direccion VALUES('$id_dir','$est_di','$muni_di','$calle_di','$nui_di','$nue_di')";
    $resultado = $conexion->query($query);
    if ($resultado) {
            $query="INSERT INTO servicios VALUES('$id_s','$Emple_s','$id_cli_s',$id_dir,'$cos_s','$dura_s','$fecha_s')";
            $resultado2 = $conexion->query($query);
            if($resultado2){
                header("Location: /WashiWashi/Admin_front.php");
            }else{
                echo "Error en la ejecución de la insercion: " . $conexion->error;
            }
    } else {
        echo "Error en la ejecución de la insercion: " . $conexion->error;
    }
          

       //Y cheque mi cuarto y cheque mi cama y  nada 
    
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