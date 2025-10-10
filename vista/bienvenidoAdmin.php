<?php
    include_once "../middleWork/controlarSesiones.php";
    var_dump($_SESSION["datos"]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio de Admin</title>
</head>
<body>
    <p>Bienvenido Admin!</p>
    <div class="crudUsuario">
        <button onclick="window.location.href='listar.php'">Listar Usuarios</button> <br>
        <button onclick="window.location.href='insert.php'">Insertar Usuarios</button>
    </div>


</body>
</html>
