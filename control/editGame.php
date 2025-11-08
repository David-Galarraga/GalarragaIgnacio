<?php
require_once "../entidades/Juegos.php";
require_once "../middleWork/controlarSesiones.php";
if (!$_SESSION["datos"]["rol"] === "Admin") {
        header("Location: ../index.php");
        exit();
    }
$juego = new Juego();
$juego->update($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["thumbnail"], $_POST["plataforma"]);

echo "Juego actualizado." . "\n";
echo "<button onclick=\"window.location.href='../vista/bienvenidoAdmin.php'\">Volver</button>";

?>