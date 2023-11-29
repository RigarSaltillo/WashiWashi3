<?php
session_start(); 
try{
    $server="localhost";
 $user="root";
 $pass="";
 $db="whashiwaship4n";
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["username"];
    $contrasena = $_POST["password"];
    $rol = $_POST["f_rol"];
    $conexion = new mysqli($server, $user, $pass, $db);

    // Validar los datos con la base de datos
    $query = "SELECT * FROM EMPLEADOS WHERE NOMBRE_FLOTILLA = '$usuario' AND CONTRASENA = '$contrasena' AND ROOL='$rol'";
    $resultado = $conexion->query($query);

    if ($resultado->num_rows > 0) {
        // Datos correctos, el usuario está autenticado
        //echo "Inicio de sesión exitoso";
        $_SESSION['usuario'] = $usuario;
        if ($rol == 1) {
           header("Location: /WashiWashi/Admin_front.php");
       }else{
        header("Location: /WashiWashi/Empleado_front.php");
       }

    } else {
        // Datos incorrectos, el usuario no está autenticado
        echo "Inicio de sesión fallido";
    }
}
} catch (Exception $e) {
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