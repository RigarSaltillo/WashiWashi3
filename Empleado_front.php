
<?php
session_start();
// Verifica si hay una sesión activa
if (!isset($_SESSION['usuario'])) {
    header("Location: /WashiWashi2/Login.php"); // Redirige a la página de inicio de sesión si no hay sesión activa
    exit();
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Empleado_style.css">
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
<nav>
        <ul>
            <li><a href="Procedimentos/Cierre_sesion.php">Cerrar secion</a></li>
        </ul>
    </nav>
    
    <div class="container">
        <div class="title">
            <label for="">Bienbenido</label>
            <br>
            <label for="">Calendario de acttividades</label>
        </div>
        <div class="actividades">
        <div class="item">
        <label for="">Fecha</label><br>
        <label for="">Las actividades de hoy son:</label>
        <br>
        <div class="button">
            <button>Carga Evidencia</button>
        </div>
        </div>
    <div class="item">
        <label for="">Fecha</label><br>
        <label for="">Las actividades de mañana son:</label>
        <br>
        <div class="button">
            <button>Carga Evidencia</button>
        </div>
        </div>
    <div class="item">
        <label for="">Fecha</label><br>
        <label for="">Las actividades de mañana son:</label>
        <br>
        <div class="button">
            <button>Carga Evidencia</button>
        </div>
        </div>
    <div class="item">
        <label for="">Fecha</label><br>
        <label for="">Las actividades de mañana son:</label>
        <br>
        <div class="button">
            <button>Carga Evidencia</button>
        </div>
     </div>
    <div class="item">
        <label for="">Fecha</label><br>
        <label for="">Las actividades de mañana son:</label>
        <br>
        <div class="button">
            <button>Carga Evidencia</button>
        </div>
    </div>
    <div class="item">
        <label for="">Fecha</label><br>
        <label for="">Las actividades de mañana son:</label>
        <br>
        <div class="button">
        <button>Carga Evidencia</button>
    </div>
    </div>
    </div>
    </div>
</body>
</html>