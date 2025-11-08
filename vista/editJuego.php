<?php
    include_once "../middleWork/controlarSesiones.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Juego</title>
</head>
<body>
    <form method="post" action="../control/editGame.php">
        <label for="id">Id del juego a cambiar</label> <br>
        <input name="id" type="id" required> <br>

        <label for="nombre">Nombre</label> <br>
        <input name="nombre" type="nombre" required> <br>

        <label for="descripcion">Descripcion</label> <br>
        <input name="descripcion" type="descripcion" required> <br>

        <label for="thumbnail">Thumbnail</label> <br>
        <input name="thumbnail" type="thumbnail" required> <br>

        <label for="plataforma">Plataforma</label> <br>
        <input name="plataforma" type="plataforma" required> <br>

        <input type="submit" value="enviar">
    </form>
    <button onclick="window.location.href='bienvenidoAdmin.php'">Volver</button>
</body>
</html>