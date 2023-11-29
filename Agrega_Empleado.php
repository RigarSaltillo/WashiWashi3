<?php
session_start();
// Verifica si hay una sesión activa
if (!isset($_SESSION['usuario'])) {
    header("Location: /WashiWashi/Login.php"); // Redirige a la página de inicio de sesión si no hay sesión activa
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/agregaCli.css">
    <style>
        nav {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            display: inline;
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }
        </style>
</head>
<body>
<div class="menu">
<nav>
    <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="Admin_front.php">Servicios</a></li>
        <li><a href="Agrega_Empleado.php">Alta Empleado</a></li>
        <li><a href="AgregarCliente.php">Alta Cliente</a></li>
        <li><a href="#">Reporte Servicios</a></li>
        <li><a href="Procedimentos/Cierre_sesion.php">Cerrar Sesión</a></li> <!-- Nuevo enlace para cerrar sesión -->
    </ul>
</nav>
</div>
<div class="formulario">
    <Form  method="post" action="Procedimentos/AgregaEmpleado.php">
        <div>
            <H2>Crea un Empleado</H2>
            <br>
            <h3>Recuerda que solo se agregara el id 
                <br>y el rol que desempeña</h3>
        </div>
        <div>
            <label for="idEmpleado">Ingresa el id del Empleado</label>
            <input type="number" id="idEmpleado" name="idEmpleado" required><br>
        
            <label for="rol_empleado">Ingresa el rol del Empleado</label>
            <input type="number" id="rol_empleado" name="rol_empleado" required>
        
        </div>
    </div>

    </Form>
</body>
</html>