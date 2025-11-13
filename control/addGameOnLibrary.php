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
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
                <title>Error</title>
            </head>
            <body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">
                <div class="w-full max-w-md">
                    <div class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4 border-t-4 border-orange-500 text-center">
                        <p class="text-orange-600 text-xl font-bold mb-4">Petición invalida - Juego ya incluido en biblioteca</p>
                        <button onclick="window.location.href='../control/addListGames.php'"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer transition duration-300 ease-in-out w-full mt-4">
                            Volver
                        </button>
                    </div>
                </div>
            </body>
            </html>
            <?php
            die;
        }
    }

    $biblioteca -> addGame($idBiblioteca, $idJuego);
    header("Location: addListGames.php");
    exit();
}
// Si no hay idJuego, no se imprime nada (puede que se quiera redirigir si no hay GET)
?>