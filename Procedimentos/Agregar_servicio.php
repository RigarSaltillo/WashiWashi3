<?php
try{
    $server="localhost";
    $user="root";
    $pass="";
    $db="washiwaship4m";
    $conexion = new mysqli($server, $user, $pass, $db);

      
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $fecha_s=$_POST["fecha_s"];
     $admin_s=$_POST["select_admin"];
     $dura_s=$_POST["dura_s"];
     $cos_s=$_POST["cos_s"];
     $cli_s=$_POST["selCliente"];
     //Direccion 
     $cd_s=$_POST["codpostal"];
     $tipoase_s=$_POST["tipoase"];
     $ase_s=$_POST["ase"];

       if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    $query = "SELECT ID_DIRECXION FROM direccion WHERE COD_POSTAL='$cd_s' AND TIPO_ASENTAMIENTO='$tipoase_s' AND ASENTAMIENTO='$ase_s'";
    $resultado = $conexion->query($query);
    
    if ($resultado !== false) {
        // La consulta se ejecutó correctamente, ahora verificamos si hay resultados
        if ($resultado->num_rows > 0) {
            // Hay al menos un resultado, obtenemos el ID_DIRECXION
            $fila = $resultado->fetch_assoc();
            $idDireccion = $fila['ID_DIRECXION'];
          $query2="insert INTO servicios (ID_ADMIN,ID_CLIENTE,ID_DIRECXION,COSTO,DURACION,FECHA_INICIO) VALUES('$admin_s','$cli_s','$idDireccion','$cos_s','$dura_s','$fecha_s')";
          $resultado2=$conexion->query($query2);
          if($resultado !== false){
            header("Location: /WashiWashi3/Admin_front.php");
        }
        } else {
            // No hay resultados, realiza alguna acción aquí
            echo "No se encontraron resultados para la consulta.";
        }
    } else {
        // Hubo un error en la consulta
        echo "Error en la obtención del id de dirección: " . $conexion->error;
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