<?php
session_start();
// Verifica si hay una sesión activa
if (!isset($_SESSION['usuario'])) {
    header("Location: /WashiWashi3/Login.php"); // Redirige a la página de inicio de sesión si no hay sesión activa
    exit();
}
include __DIR__ . "/Procedimentos/Select_Clientes.php";
$clientes = obtenerclientes();
include __DIR__ . "/Procedimentos/Select_admins.php";
$admins = obteneradmins();
include __DIR__ . "/Procedimentos/Select_colonia.php";
$colonias = obtenercolonias();
include __DIR__ . "/Procedimentos/Select_cp.php";
$cd_p = obtenercodigopostal();
include __DIR__ . "/Procedimentos/Select_asen.php";
$asentamiento = obtenerasentamiento();
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
        <li><a href="Otras_opcioines.php">Otros</a></li>
        <li><a href="Admin_front.php">Servicios</a></li>
        <li><a href="Agrega_Empleado.php">Alta Empleado</a></li>
        <li><a href="AgregarCliente.php">Alta Cliente</a></li>
        <li><a href="Detalle_Servicio.php">Detalle Servicios</a></li>
        <li><a href="Procedimentos/Cierre_sesion.php">Cerrar Sesión</a></li> <!-- Nuevo enlace para cerrar sesión -->
    </ul>
</nav>
</div>
    <div class="formulario">
            <h1>Servicio</h1>
            <form method="post" action="Procedimentos/Agregar_servicio.php">
                <br>
                <label for="fechaInicio">Fecha de Inicio</label>
                <input id="fechaInicio" type="date" name="fecha_s">
                <br>
                <Label for="select_admin" >Selecione al jefe de flotilla </Label>
            <select name="select_admin" id="select_admin">
            <option value="0">Selecione</option>
            <?php
            foreach ($admins as $admins) {
                echo "<option value='{$admins['ID_ADMIN']}'>{$admins['NOMBRE']}</option>";
            }
            ?>
            </select><br>

                <label for="">Tiempo Programado</label>
                <input type="text" required name="dura_s">
                <br>
                <label for="cos_s">Costo Presupuestado</label>
                <input type="number" name="cos_s" id="cos_s" required><br>
                <label for="selectCliente">Selecciona un cliente:</label>
   
                <select id="selectCliente" name="selCliente">
            <option value="0">Seleccione</option>
            <?php
            foreach ($clientes as $cliente) {
                echo "<option value='{$cliente['ID_CLIENTE']}'>{$cliente['NOMBRE2']}</option>";
            }
            ?>
        </select><br>
        <label for="codpostal">Selecciona tu codigo postal</label>
        <Select id="codpostal" name="codpostal">
            <option value="0">Seleccione</option>
            <?php
           foreach ($cd_p as $code_p) {
            echo "<option value='{$code_p['COD_POSTAL']}'>{$code_p['COD_POSTAL']}</option>";
        }
            ?>
        </Select><br>

        <label for="tipoase">Selecciona el tipo asentmiento</label>
        <Select id="tipoase" name="tipoase">
            <option value="0">Seleccione</option>
            <?php
           foreach ($colonias as $colonia) {
            echo "<option value='{$colonia['TIPO_ASENTAMIENTO']}'>{$colonia['TIPO_ASENTAMIENTO']}</option>";
        }
            ?>
        </Select><br>
        <label for="ase">Selecciona el Asentamiento</label>
        <Select id="ase" name="ase">
            <option value="0">Seleccione</option>
            <?php
           foreach ($asentamiento as $asentamientos) {
            echo "<option value='{$asentamientos['ASENTAMIENTO']}'>{$asentamientos['ASENTAMIENTO']}</option>";
        }
            ?>
        </Select><br>
        


    <button type="submit">Guardar Servicio</button>
        
</form>
</div>
</body>
</html>