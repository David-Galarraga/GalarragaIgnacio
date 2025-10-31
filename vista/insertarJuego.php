<?php
    include_once "../middleWork/controlarSesiones.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Juego</title>
</head>
<body>
    <h1>Insertar un nuevo juego</h1> <br>
    <form method="post" action="../control/insertGame.php">
        <label for="titulo">Titulo</label> <br>
        <input name="titulo" type="titulo" required> <br>

        <label for="descripcion">Descripcion</label> <br>
        <input name="descripcion" type="descrpcion" required> <br>

        <label for="thumbnail">Thumbnail</label> <br>
        <input name="thumbnail" type="thumbnail" required> <br>

        <label for="plataforma">Plataforma</label> <br>
        <input name="plataforma" type="plataforma" required> <br>

        <input type="submit" value="enviar">
    </form>
    
    <button onclick="window.location.href='bienvenidoAdmin.php'">Volver</button>
</body>
</html>