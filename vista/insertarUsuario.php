<?php
    include_once "../middleWork/controlarSesiones.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>
    <h1>Registar un nuevo usuario</h1> <br>
    <form method="post" action="../control/insert.php">
        <label for="password">Password</label> <br>
        <input name="password" type="nickname" required> <br>

        <label for="nombre">Nombre</label> <br>
        <input name="nombre" type="nombre" required> <br>

        <label for="apellido">Apellido</label> <br>
        <input name="apellido" type="apellido" required> <br>

        <label for="nickname">Nickname</label> <br>
        <input name="nickname" type="nickname" required> <br>

        <label for="rol">Rol</label> <br>
        <input name="rol" type="rol" required> <br>

        <input type="submit" value="enviar">
    </form>
    <button onclick="window.location.href='bienvenidoAdmin.php'">Volver</button>;
</body>
</html>