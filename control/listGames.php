<?php
require_once "../entidades/Juegos.php";
require_once "../middleWork/controlarSesiones.php";
$juego = new Juego();
$juegos = $juego -> getAll();

foreach ($juegos as $j) {
    echo "ID: $j->id NOMBRE $j->nombre PLATAFORMA: $j->plataforma <br> DESCRIPCION: $j->descripcion <br> <hr>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Juegos</title>
</head>
<body>
    <button onclick="window.location.href='../vista/bienvenidoAdmin.php'">Volver</button>
</body>
</html>