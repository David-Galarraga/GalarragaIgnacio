<?php
require_once "../middleWork/controlarSesiones.php";
require_once "../entidades/Juegos.php";
if (!$_SESSION["datos"]["rol"] === "usuario") {
        header("Location: ../index.php");
        exit();
    }


$juego = new Juego();
$juegos = $juego -> getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Lista de Juegos</title>
</head>
<body class="bg-gray-100 min-h-screen">
    
    <header class="bg-white shadow-md p-4 flex justify-between items-center sticky top-0 z-10"> 
        <h1 class="text-xl font-bold text-gray-800">Juegos Disponibles</h1>
        <nav class="space-x-4">
            <button onclick="window.location.href='../vista/bienvenidoUsuario.php'"
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
        
        <div class="mb-6 flex justify-between items-center border-b pb-4">
            <h2 class="text-3xl font-extrabold text-gray-800">Catálogo de Juegos</h2> <br>
            <button onclick="window.location.href='../vista/juegosBibliotecas.php'"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-200 shadow-md">
                Volver
            </button> <br>
        </div>
        
        <div class="space-y-6">
            <?php
                if (!empty($juegos)) {
                    foreach ($juegos as $j) {
                        $idJuego = htmlspecialchars($j->id);
                        $nombre = htmlspecialchars($j->nombre);
                        $plataforma = htmlspecialchars($j->plataforma);
                        $descripcion = htmlspecialchars($j->descripcion);

                        echo '<div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition duration-300">';
                        
                        echo "<p class='mb-2'><span class='font-bold text-sm text-gray-600'>ID:</span> {$idJuego}</p>";
                        echo "<p class='mb-2'><span class='text-xl font-bold text-gray-800'>{$nombre}</span></p>";
                        echo "<p class='mb-3'><span class='text-sm font-medium text-indigo-600'>Plataforma:</span> {$plataforma}</p>";
                        echo "<p class='mb-4 text-gray-700'>{$descripcion}</p>";
                        
                        echo "<button onclick=\"window.location.href='addGameOnLibrary.php?idJuego={$idJuego}'\"";
                        echo "class='bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded transition duration-200 shadow-md'>";
                        echo "Añadir a la Biblioteca";
                        echo "</button>";
                        
                        echo '</div>'; 
                    }
                } else {
                    echo '<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md shadow-sm">';
                    echo '<p>No hay juegos disponibles en este momento.</p>';
                    echo '</div>';
                }
            ?>
        </div>
        
    </main>
    
</body>
</html>