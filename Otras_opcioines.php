<?php
session_start();
// Verifica si hay una sesión activa
if (!isset($_SESSION['usuario'])) {
    header("Location: /WashiWashi3/Login.php"); // Redirige a la página de inicio de sesión si no hay sesión activa
    exit();
}
include __DIR__ . "/Procedimentos/Select_admins.php";
$admins = obteneradmins();
include __DIR__ . "/Procedimentos/Select_Clientes.php";
$clientes = obtenerclientes();
include __DIR__ . "/Procedimentos/select_emple_c.php";
$empleados = obtenerempleado();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/vistas3.css">
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
    <Form  method="post" action="Procedimentos/Otras_opciones.php">
        <h1>Detalle servicios alta</h1>
        <label for="id_ser">Ingrese el id del servicio</label>
        <input type="number" name="id_ser" id="id_ser">
        <br>
        <label for="">Ingrese el status</label>
        <select name="estatus" id="estatus" require>
            <option value="0">Selecione</option>
            <option value="1">Procesando</option>
            <option value="2">Finalizado</option>
        </select>
        <br>
        <label for="">Ingrese la evidencia</label>
        <input type="file" name="foto" id="foto" accept="image/*">
        <br>
        <label for="">Ingrese algun comentario</label>
        <input type="text" name="comentarios"><br>

     <button type="submit">Guardar</button>
    </Form>
</div>
<br>
<div class="container2">
<h2>Modificar Cliente    </h2>
        <br>
        <form id="formularioCliente" action="Procedimentos/ActualizarCli.php" method="post">
    <label for="cli_s">Seleccione el cliente</label>
    <select name="cli_s" id="cli_s">
        <option value="0">Selecione</option>
        <?php
            foreach ($clientes as $cliente) {
                echo "<option value='{$cliente['ID_CLIENTE']}'>{$cliente['NOMBRE2']}</option>";
            }
            ?>

    </select>
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
            <button type="submit">Actualizar</button>
        </form>
</div><br>
<div class="container3">

        <Form  method="post" action="Procedimentos/Actualiza_empleado.php">
        <div>
            <H2>Modifica un Empleado</H2>
        </div>
        <div>
        <label for="id_empleado">Seleccione el Empleado</label>
        <select name="id_empleado" id="id_empleado">
        <option value="0">Seleccione</option>
        <?php
            foreach ($empleados as $empleado) {
                echo "<option value='{$empleado['ID_EMPLEADO']}'>{$empleado['nombre_empleado']}</option>";
            }
            ?>
        </select><br>    
        <Label for="select_admin" >Selecione al jefe de flotilla asignado</Label>
            <select name="select_admin" id="select_admin">
            <option value="0">Selecione</option>
            <?php
            foreach ($admins as $admins) {
                echo "<option value='{$admins['ID_ADMIN']}'>{$admins['NOMBRE']}</option>";
            }
            ?>
            </select>
            <br>
            <label for="nom_empleado">Nombre del Empleado</label>
            <input type="text" id="nom_empleado" name="nom_empleado"><br>
            <label for="Ap_pat">Primer apellido</label>
            <input type="text" id="Ap_pat" name="Ap_pat" require> <br>
            <label for="Ap_mat">Segundo apellido</label>
            <input type="text" id="Ap_mat" name="Ap_mat" require><br>
            <label for="contra_emp">Ingrese la contaseña</label>
            <input type="text" id="contra_emp" name="contra_emp">
        </div>
        <button type="submit">Guardar</button>
    </div>
    </Form>
</div>

</body>
</html>