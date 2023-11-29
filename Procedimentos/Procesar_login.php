<?php
session_start();

try {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "washiwaship4m";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["username"];
        $contrasena = $_POST["password"];
        $rol = $_POST["f_rol"];
        $conexion = new mysqli($server, $user, $pass, $db);

        if ($rol == 1) {
            $query = "SELECT * FROM admins WHERE NOMBRE='$usuario' AND CONTRA_A='$contrasena'";
            $resultado = $conexion->query($query);

            if ($resultado->num_rows > 0) {
                // Datos correctos, el usuario está autenticado
                $_SESSION['usuario'] = $usuario;
                header("Location: /WashiWashi2/Admin_front.php");
            } else {
                // Datos incorrectos, el usuario no está autenticado
                echo "Inicio de sesión fallido";
            }
        } else {
            // Validar los datos con la base de datos
            $query = "SELECT * FROM EMPLEADOS WHERE nombre_empleado = '$usuario' AND CONTRASENA = '$contrasena'";
            $resultado = $conexion->query($query);

            if ($resultado->num_rows > 0) {
                // Datos correctos, el usuario está autenticado
                $_SESSION['usuario'] = $usuario;
                header("Location: /WashiWashi2/Empleado_front.php");
            } else {
                // Datos incorrectos, el usuario no está autenticado
                echo "Inicio de sesión fallido";
            }
        }
    }
} catch (Exception $e) {
    // Manejar la excepción
    echo "Error: " . $e->getMessage();
} finally {
    // Cerrar la conexión en el bloque finally para asegurarse de que se cierre incluso si hay una excepción
    if (isset($conexion)) {
        $conexion->close();
        echo "La conexión se cerró correctamente";
    }
}
?>
