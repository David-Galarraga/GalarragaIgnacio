<?php
    include_once "../middleWork/controlarSesiones.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Usuario</title>
</head>
<body>
    <header> 
        <button onclick="window.location.href='bienvenidoUsuario.php'">Inicio</button>
        <button onclick="window.location.href='../middleWork/logoutSesion.php'">Salir</button>
    </header> <hr>
    <div>
        <button onclick="window.location.href=''">Perfil</button> <br>
        <button onclick="window.location.href='juegosBibliotecas.php'">Biblioteca</button> <br>
    </div>
</body>
</html>