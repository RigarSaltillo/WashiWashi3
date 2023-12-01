<?php
session_start();
// Verifica si hay una sesión activa
if (!isset($_SESSION['usuario'])) {
    header("Location: /WashiWashi3/Login.php"); // Redirige a la página de inicio de sesión si no hay sesión activa
    exit();
}
include __DIR__ . "/Procedimentos/Select_admins.php";
$admins = obteneradmins();
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
        <li><a href="Detalle_Servicio.php">Detalles Servicios</a></li>
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
</body>
</html>