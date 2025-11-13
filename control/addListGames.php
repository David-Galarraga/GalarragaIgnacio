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
    <link rel="shortcut icon" href="../img/faviconVapourware.ico" type="image/x-icon">
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

    <main class="container mx-auto max-w-7xl p-6">
        
        <div class="mb-6 flex justify-between items-center border-b pb-4">
            <h2 class="text-3xl font-extrabold text-gray-800">Catálogo de Juegos</h2>
            <button onclick="window.location.href='../vista/juegosBibliotecas.php'"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-200 shadow-md">
                Volver
            </button>
        </div>
        
        <!-- Grilla tipo estantería -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php
                if (!empty($juegos)) {
                    foreach ($juegos as $j) {
                        $idJuego = htmlspecialchars($j->id);
                        $nombre = htmlspecialchars($j->nombre);
                        $plataforma = htmlspecialchars($j->plataforma);
                        $descripcion = htmlspecialchars($j->descripcion);
                        $thumbnail = htmlspecialchars($j->thumbnail);

                        echo '<div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border-t-4 border-green-500 flex flex-col h-full">';
                        
                        // Imagen thumbnail
                        echo "<div class='w-full h-48 bg-gray-200 overflow-hidden'>";
                        echo "<img src='{$thumbnail}' alt='Thumbnail de {$nombre}' class='w-full h-full object-cover hover:scale-110 transition-transform duration-300'>";
                        echo "</div>";
                        
                        // Contenido de la card
                        echo "<div class='p-5 flex flex-col flex-grow'>";
                        
                        // Encabezado
                        echo "<div class='mb-3'>";
                        echo "<h3 class='text-lg font-bold text-gray-800 mb-1 line-clamp-2'>{$nombre}</h3>";
                        echo "<span class='text-xs font-semibold text-gray-500 bg-gray-100 px-2 py-1 rounded'>ID: {$idJuego}</span>";
                        echo "</div>";
                        
                        // Plataforma
                        echo "<p class='text-sm text-indigo-600 font-medium mb-3 flex-shrink-0'>";
                        echo "<span class='bg-indigo-100 px-2 py-1 rounded'>📱 {$plataforma}</span>";
                        echo "</p>";
                        
                        // Descripción
                        echo "<p class='text-gray-700 text-sm leading-relaxed line-clamp-3 flex-grow mb-4'>{$descripcion}</p>";
                        
                        // Botón añadir
                        echo "<button onclick=\"window.location.href='addGameOnLibrary.php?idJuego={$idJuego}'\"";
                        echo " class='bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded transition duration-200 shadow-md w-full mt-auto'>";
                        echo "Añadir a la Biblioteca";
                        echo "</button>";
                        
                        echo '</div>'; // cierre del div de contenido
                        echo '</div>'; // cierre del div principal de la card
                    }
                } else {
                    echo '<div class="col-span-full bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md shadow-sm">';
                    echo '<p>No hay juegos disponibles en este momento.</p>';
                    echo '</div>';
                }
            ?>
        </div>
        
    </main>
    
</body>
</html>