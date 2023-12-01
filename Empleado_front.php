
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
            <label for="">Acttividad</label>
        </div>
        <DIV class="item">
            <form action="Procedimentos/Insert_emple.php" method="post">
        <label for="fechaActual">Fecha</label><br>
        <label id="fechaActual"></label>
        <script>
        var labelFecha = document.getElementById("fechaActual");
        var fechaActual = new Date();
        var fechaFormateada = fechaActual.toISOString().split("T")[0];
        labelFecha.textContent = fechaFormateada;
        </script><br>
        <label for="">Las actividades de hoy son:</label>
        <br>
        
        <label for="">Ingresa tu id</label>
        <Input type="text" name="emple_id"></Input>
        <br>
        <label for="">Comentarios</label>
        <input type="text" name="comentario">
        <br>
        <input type="file" name="foto" id="foto" accept="image/*">
        <div class="button">
            <button type="submit">Carga Evidencia</button>
            </form>
        </div>
        </DIV>
    </div>
    
    </div>
</body>
</html>