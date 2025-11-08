<?php
    include_once "../middleWork/controlarSesiones.php";
    if (!$_SESSION["datos"]["rol"] === "Admin") {
        header("Location: ../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio de Admin</title>
</head>
<body>
    <header> 
        <button onclick="window.location.href='bienvenidoAdmin.php'">Inicio</button>
        <button onclick="window.location.href='../middleWork/logoutSesion.php'">Salir</button>
    </header> <hr>
    <p>Bienvenido Admin!</p>
    <div>
        <button onclick="window.location.href='../control/listar.php'">Listar usuarios</button> <br>
        <button onclick="window.location.href='insertarUsuario.php'">Insertar usuarios</button> <br>
        <button onclick="window.location.href='deleteUsuario.php'">Eliminar usuarios</button> <br>
        <button onclick="window.location.href='editUsuario.php'">Editar usuarios</button> <br>
    </div>
    <hr>
    <div>
        <button onclick="window.location.href='../control/listGames.php'">Listar juegos</button> <br>
        <button onclick="window.location.href='insertarJuego.php'">Insertar juego</button> <br>
        <button onclick="window.location.href='deleteJuego.php'">Eliminar juego</button> <br>
        <button onclick="window.location.href='editJuego.php'">Editar juego</button> <br>
    </div>


</body>
</html>
