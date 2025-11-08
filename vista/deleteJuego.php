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
    <title>Eliminar</title>
</head>
<body>
    <h1>Eliminar un juego por ID</h1> <br>
    <form method="post" action="../control/deleteGame.php">
        <label for="id">ID</label> <br>
        <input name="id" type="id" required> <br>

        <input type="submit" value="enviar">
    </form>
    <button onclick="window.location.href='bienvenidoAdmin.php'">Volver</button>

</body>
</html>