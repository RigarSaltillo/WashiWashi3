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
    <div id="" class="formulario">
        <h2>Agregar Cliente    </h2>
        <br>
        <form id="formularioCliente" action="Procedimentos/agregaCli.php" method="post">
            <label for="idcli">    ID Cliente</label>
            <input type="number" id="idcli" name="idcliente" required>
    <br>
            <label for="nombrec">     Nombre:</label>
            <input type="text" id="nombrec" name="nombrec" required>
    <br>
            <label for="apellidopc">   Apellido Paterno:</label>
            <input type="text" id="apellidopc" name="apellidopc" required>
    <br>
            <label for="apellidomc">  Apellido Materno</label>
            <input type="text" id="apellidomc" name="apellidomc" required>
    <br>
    <label for="">   Numero de telefono:</label>
    <input type="text" id="telefonoc" name="telefonoc" required>
<br>
            <button type="submit">Guardar</button>
        </form>
    </div>   
</body>
</html>
