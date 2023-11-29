
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="stile_registro.css">
</head>
<body>
    
        <form method="post" action="Procedimentos/Actualisar_registro_emple.php">
        <h1 class="title">Registro</h1>
        <div class="form-input usernamed">
            <label>
                <input type="text" id="id_emple_a" placeholder="Ingresa tu id" required name="id_emple_a">
            </label>
            <p calss="mensajeError"></p>
    
    </div>
        <div class="form-input usernamed">
        <label>
            <input type="text" id="username" placeholder="Ingresa tu nombre" required name="nombre_emple">
        </label>
        <p calss="mensajeError"></p>

</div>

<div class="form-input pasword">
    <label>
        <input type="password" id="password" placeholder="Ingresa tu contraseña" name="pasw_emple" required>
    </label>
    <p calss="mensajeError"></p>
</div>
    <div class="">
    <label >
        <input type="text"  id="Apellido" placeholder="Apellido Paterno" name="Apellido_p" required>
    </label>
    <p calss="mensajeError"></p>
</div>

<div class="">
    <label >
        <input type="text"  id="Apellido_ma" placeholder="Apellido Materno"  name="Apellido_ma" required>
    </label>
    <p calss="mensajeError"></p>
</div>
<div>
    <label for="Rol" class="Rol">Selecciona tu rol:</label>
    <select name="Rol" id="Rol">
        <option value="Administrdor">Administrador</option>
        <option value="Empleado">Empleado</option>
    </select>
</div>
<div>
    <label>
        <button id="button" type="submit">Regitrarme</button>
    </label>
</div>
<br>  
</form>

</body>
</html>