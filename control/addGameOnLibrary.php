<?php
require_once "../entidades/Biblioteca.php";
require_once "../middleWork/controlarSesiones.php";
if (!$_SESSION["datos"]["rol"] === "usuario") {
        header("Location: ../index.php");
        exit();
    }

if (isset($_GET['idJuego'])) {
    $idJuego = $_GET['idJuego'];
    $idUsuario = $_SESSION['datos']['id'];

    $biblioteca = new Biblioteca();
    $idBiblioteca = $biblioteca -> getID($idUsuario);

    $juegosBiblioteca = $biblioteca -> getGames($idBiblioteca);

    foreach ($juegosBiblioteca as $jb) {
        if ($jb["id_juego"] == $idJuego) {
            echo "Petición invalida - Juego ya incluido en biblioteca" . "<br>";
            echo "<button onclick=\"window.location.href='../control/addListGames.php'\">Volver</button>";
            die;
        }
    }

    $biblioteca -> addGame($idBiblioteca, $idJuego);
    header("Location: addListGames.php");
    exit();
}
?>