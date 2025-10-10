<?php
require_once "middleWork/controlarSesiones.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="control\UsuarioControlador.php">
        <label for="nickname">nickname</label> <br>
        <input name="nickname" type="nickname" required> <br>
        <label for="password">contraseña</label> <br>
        <input name="password" type="password" required> <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

