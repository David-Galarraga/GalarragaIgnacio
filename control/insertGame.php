<?php
require_once "../entidades/Juegos.php";
require_once "../middleWork/controlarSesiones.php";
if (!$_SESSION["datos"]["rol"] === "Admin") {
        header("Location: ../index.php");
        exit();
    }
$api = file_get_contents("../datos/Juegos.json");
$datos = json_decode($api, true);

$juego = new Juego();
$juego -> addGame($_POST["titulo"], $_POST["descripcion"], $_POST["thumbnail"], $_POST["plataforma"]);
/*
 foreach ($datos as $j) {
    $juego = new Juego();
    $juego -> addGame($j["title"],$j["short_description"], $j["thumbnail"], $j["platform"]);
}  */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar juego</title>
</head>
<body>
    <p>Juego insertado con exito</p> <br>
    <button onclick="window.location.href='../vista/bienvenidoAdmin.php'">Volver</button> <br>
</body>
</html>   
