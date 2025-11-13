<?php
require_once "../middleWork/controlarSesiones.php";
require_once "../entidades/Biblioteca.php";
if (!$_SESSION["datos"]["rol"] === "usuario") {
        header("Location: ../index.php");
        exit();
    }
$biblioteca = new Biblioteca();
$idBiblioteca = $biblioteca -> getID($_SESSION["datos"]["id"]);


$juegosBiblioteca = $biblioteca -> getGamesDetails($idBiblioteca);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="shortcut icon" href="../img/faviconVapourware.ico" type="image/x-icon">
    <title>Biblioteca Personal</title>
</head>
<body class="bg-gray-100 min-h-screen">
    
    <header class="bg-white shadow-md p-4 flex justify-between items-center sticky top-0 z-10"> 
        <h1 class="text-xl font-bold text-gray-800">Mi Biblioteca</h1>
        <nav class="space-x-4">
            <button onclick="window.location.href='bienvenidoUsuario.php'"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200 shadow-md">
                Inicio
            </button>
            <button onclick="window.location.href='../middleWork/logoutSesion.php'"
                class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition duration-200 shadow-md">
                Salir
            </button>
        </nav>
    </header>

    <main class="container mx-auto p-6">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 border-b pb-4">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-4 sm:mb-0">Mis Juegos</h2>
            <div class="space-y-3 sm:space-y-0 sm:space-x-4 flex flex-col sm:flex-row w-full sm:w-auto">
                <button onclick="window.location.href='../control/addListGames.php'"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-200 shadow-md">
                    Añadir juego
                </button> <br>
                <button onclick="window.location.href='bienvenidoUsuario'"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-200 shadow-md">
                    Volver
                </button> <br>
            </div>
        </div>

        <p class="space-y-6">
            <?php
                if (!empty($juegosBiblioteca)) {
                    foreach ($juegosBiblioteca as $jb){
                        $idJuego = htmlspecialchars($jb["id"]);
                        $nombre = htmlspecialchars($jb["nombre"]);
                        $plataforma = htmlspecialchars($jb["plataforma"]);
                        $descripcion = htmlspecialchars($jb["descripcion"]);
                        $thumbnail = htmlspecialchars($jb["thumbnail"]);
                        
                        echo '<div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition duration-300">';
                        
                        echo <<<TEXT
                            <p class='mb-2'><span class='font-bold text-lg text-gray-800'>{$nombre}</span></p>
                            <p class='mb-1 text-sm text-gray-500'>ID: {$idJuego}</p>
                            <p class='mb-1 text-indigo-600 font-medium'>PLATAFORMAS: {$plataforma}</p>
                            <p class='mb-4 text-gray-700'>DESCRIPCION: {$descripcion}</p>
                            <img src='{$thumbnail}' alt='Thumbnail de {$nombre}' class='w-full max-h-48 object-cover rounded-md mb-4 border border-gray-200'></img> <br>
                            <button onclick="window.location.href='../control/deleteGameFromLibrary.php?idJuego={$idJuego}'"
                                class='bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-200 shadow-md w-full'>
                                Eliminar de biblioteca
                            </button>
                            <hr class="mt-4 border-gray-200">

                        TEXT;
                        echo '</div>';
                    }
                } else {
                    echo '<div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md shadow-sm">';
                    echo '<p>Tu biblioteca está vacía. Añade juegos del catálogo.</p>';
                    echo '</div>';
                }
            ?>
        </p>
    </main>
</body>
</html>