<?php
require_once "../entidades/Juegos.php";
require_once "../middleWork/controlarSesiones.php";
$juego = new Juego();
$juego->delete($_POST["id"]);
echo "Juego " . $_POST["id"] . " ha sido eliminado." . "\n";
echo "<button onclick=\"window.location.href='../vista/bienvenidoAdmin.php'\">Volver</button>";
?>