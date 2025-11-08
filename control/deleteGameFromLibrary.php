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

    $biblioteca -> deleteGame($idJuego, $idBiblioteca);
    header("Location:../vista/juegosBibliotecas.php");
    exit();
}
?>