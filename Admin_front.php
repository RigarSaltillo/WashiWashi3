<?php
session_start();
// Verifica si hay una sesión activa
if (!isset($_SESSION['usuario'])) {
    header("Location: /WashiWashi/Login.php"); // Redirige a la página de inicio de sesión si no hay sesión activa
    exit();
}
include __DIR__ . "/Procedimentos/Select_Clientes.php";
$clientes = obtenerclientes();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Admin_style.css">
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
    <div class="container">
        <div class="Servicios">
            <h1>Servicio</h1>
            <form method="post" action="Procedimentos/Agregar_servicio.php">
                <label for="id_s">ID Servicio</label>
                <input type="number" name="id_s" id="id_s" required>
                <br>
                <label for="fechaInicio">Fecha de Inicio</label>
                <input id="fechaInicio" type="date" name="fecha_s">
                <br>
                <label for="Empleado_asig">Empleado Asignado</label>
                <input id="Empleado_asig" type="number"  required name="emple_s">
                <br>
                <label for="">Tiempo Programado</label>
                <input type="text" required name="dura_s">
                <br>
                <label for="cos_s">Costo Presupuestado</label>
                <input type="number" name="cos_s" id="cos_s" required>
        
            
        </div>
        <div class="title">
        <h1>Washi Washi</h1>
        </div>
<DIV class="Clientes">
    <h1>Cliente </h1>
   <br> 
   <Label for="id_cli_ser">Ingresa el id del cliente</Label>
   <input type="number" id="id_cli_ser" name="id_cli_ser" required>
   <label for="selectCliente">Selecciona un cliente:</label>
   <select id="selectCliente" name="selectCliente">
            <?php
            foreach ($clientes as $cliente) {
                echo "<option value='{$cliente['ID_CLIENTE']}'>{$cliente['NOMBRE2']}</option>";
            }
            ?>
        </select>

</DIV>

<div class="Direcion_servicio">
    <h1>Direccion Servicio</h1>
    <label for="id_dieccion">Id Direcion</label>
    <input id="id_dieccion" type="number" name="id_direccion" required>
    <br>
    <label for="estado_di">Estado</label>
    <input id="estado_di" type="text" name="estado_di" required>
    <br>
    <label for="mun_di">Municipio</label>
    <input id="mun_di" type="text"  name="mun_di" required>
    <br>
    <label for="calle_di">Calle</label>
    <input id="calle_di" type="text" name="calle_di" required>
    <br>
    <label for="noe_di">No. Exterior</label>
    <input  id="noe_di" type="number" name="noe_di" required>
    <br>
    <label for="noi_di">No. Interior</label>
    <input id="noi_di" type="number" name="noi_di" required>
    <br>
</div>
</div>

</div>

<div class="Guardar">
    <button type="submit">Guardar Servicio</button>

</div>
</form>
    
</body>
</html>