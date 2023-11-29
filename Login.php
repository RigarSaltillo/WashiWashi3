<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loguin</title>
    <link rel="stylesheet" href="css/loguinstyle.css">
</head>
<body>
    
        <form action="Procedimentos/Procesar_login.php" method="post">
        <h1 class="title">Login</h1>
        <div class="form-input usernamed">
        <label>
            <input type="text" id="username" placeholder="Ingresa tu nombre" name="username" required>
        </label>
        <p calss="mensajeError"></p>
</div>
<div class="form-input pasword">
    <label>
        <input type="password" id="password" placeholder="Ingresa tu contraseña" name="password" required>
    </label>
    <p calss="mensajeError"></p>
</div>
<div class="form-rol">
    <label for="f_rol">Selecione su Rol</label>
    <select id="f_rol" name="f_rol">
        <option value="0">Seleccione:</option>
        <option value="1">Admin</option>
        <option value="2">Empleado</option>
        </select>
</div>
<div class="">
    <p>¿No tienes una cuenta?<br>
         <a href="registro.php">Regístrate aquí</a></p>    <p calss="mensajeError"></p>
</div>
<div>
    <label>
        <button type="submit" id="f_consulta" value="f_consulta" >Ingresar</button>
    </label>
</div>
<br>
    <script src="registro.js"></script>
</form>

</body>
</html>