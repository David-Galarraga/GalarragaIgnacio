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
        <button onclick="window.location.href='../control/listar.php'">Listar Usuarios</button> <br>
        <button onclick="window.location.href='insertarUsuario.php'">Insertar Usuarios</button> <br>
        <button onclick="window.location.href='deleteUsuario.php'">Eliminar Usuarios</button> <br>
        <button onclick="window.location.href='editUsuario.php'">Editar Usuarios</button> <br>
    </div>
    <hr>
    <div>
        <button onclick="window.location.href='../control/listGames.php'">Listar juegos</button> <br>
        <button onclick="window.location.href='insertarJuego.php'">Insertar Juego</button> <br>
    </div>


</body>
</html>
