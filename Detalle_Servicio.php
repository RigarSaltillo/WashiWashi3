<?php
session_start();
// Verifica si hay una sesión activa
if (!isset($_SESSION['usuario'])) {
    header("Location: /WashiWashi3/Login.php"); // Redirige a la página de inicio de sesión si no hay sesión activa
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Vistas.css">
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
    <li><a href="Otras_opcioines.php">Otros</a></li>
        <li><a href="Admin_front.php">Servicios</a></li>
        <li><a href="Agrega_Empleado.php">Alta Empleado</a></li>
        <li><a href="AgregarCliente.php">Alta Cliente</a></li>
        <li><a href="Detalle_Servicio.php">Detalles Servicios</a></li>
        <li><a href="Procedimentos/Cierre_sesion.php">Cerrar Sesión</a></li> <!-- Nuevo enlace para cerrar sesión -->
    </ul>
</nav>
</div>
<div class="container">
    <button onclick="mostrarServicios()">Mostrar Servicios</button>
    <div id="resultado"></div>

    <script>
        function mostrarServicios() {
            // Hacer una solicitud AJAX para obtener los servicios
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Manipular los datos recibidos (puede variar según el formato de tus datos)
                    var datos = JSON.parse(xhr.responseText);
                    mostrarTablaServicios(datos);
                }
            };

            // Hacer la solicitud a tu script PHP que realiza la consulta
            xhr.open("GET", "Procedimentos/Consulta_servicios.php", true);
            xhr.send();
        }

        function mostrarTablaServicios(datos) {
            // Crear una tabla y mostrar los datos
            var tabla = "<table border='1'><tr><th>ID Servicio</th><th>Costo</th><th>Duración</th><th>Fecha Inicio</th></tr>";
            for (var i = 0; i < datos.length; i++) {
                tabla += "<tr><td>" + datos[i].ID_SERVIVIO + "</td><td>" + datos[i].COSTO + "</td><td>" + datos[i].DURACION + "</td><td>" + datos[i].FECHA_INICIO + "</td></tr>";
            }
            tabla += "</table>";

            // Mostrar la tabla en el elemento con id 'resultado'
            document.getElementById("resultado").innerHTML = tabla;
        }
    </script>
</div>

<br>

<div class="container2">
    <button onclick="mostrarDetalleServicios()">Mostrar Detalles Servicios</button>
    <div id="resultadoDetalle"></div>

    <script>
        function mostrarDetalleServicios() {
            // Hacer una solicitud AJAX para obtener los servicios
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Manipular los datos recibidos (puede variar según el formato de tus datos)
                    var datos = JSON.parse(xhr.responseText);
                    mostrarTablaDetallesServicios(datos);
                }
            };

            // Hacer la solicitud a tu script PHP que realiza la consulta
            xhr.open("GET", "Procedimentos/select_detallesS.php", true);
            xhr.send();
        }

        function mostrarTablaDetallesServicios(datos) {
            // Crear una tabla y mostrar los datos
            var tabla = "<table border='1'><tr><th>ID Detalle</th><th>ID Servicio</th><th>Estaus</th><th>Evidencia</th><th>Comentarios</th></tr>";
            for (var i = 0; i < datos.length; i++) {
                tabla += "<tr><td>" + datos[i].ID_DETALLE + "</td><td>" + datos[i].ID_SERVIVIO + "</td><td>" + datos[i].ESTATUS + "</td><td>" + datos[i].EVIDENCIA_ + "</td><td>" + datos[i].COMENTARIOS + "</td></tr>";
            }
            tabla += "</table>";

            // Mostrar la tabla en el elemento con id 'resultadoDetalle'
            document.getElementById("resultadoDetalle").innerHTML = tabla;
        }
    </script>
</div>
</body>
</html>
