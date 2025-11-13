<?php
require_once "../entidades/Juegos.php";
require_once "../middleWork/controlarSesiones.php";
if (!isset($_SESSION["datos"]["rol"]) || $_SESSION["datos"]["rol"] !== "Admin") {
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
<body class="bg-gray-100 min-h-screen p-8">
    <main class="container mx-auto max-w-7xl">
        
        <h1 class="text-3xl font-extrabold text-gray-800 mb-8 border-b pb-4">Listado de Juegos</h1>
        
        <div class="mb-8">
            <button onclick="window.location.href='../vista/bienvenidoAdmin.php'"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded transition duration-200 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                Volver
            </button>
        </div>

        <!-- Grilla tipo estantería -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php
            if (!empty($juegos)) {
                foreach ($juegos as $j) {
                    $nombre_juego = htmlspecialchars($j->nombre);
                    $plataforma = htmlspecialchars($j->plataforma);
                    $descripcion = htmlspecialchars($j->descripcion);
                    $id = htmlspecialchars($j->id);
                    $thumbnail = htmlspecialchars($j->thumbnail);
                    
                    echo '<div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border-t-4 border-indigo-500 flex flex-col h-full">';
                    
                    // Imagen thumbnail
                    echo "<div class='w-full h-48 bg-gray-200 overflow-hidden'>";
                    echo "<img src='{$thumbnail}' alt='{$nombre_juego}' class='w-full h-full object-cover hover:scale-110 transition-transform duration-300'>";
                    echo "</div>";
                    
                    // Contenido de la card
                    echo "<div class='p-5 flex flex-col flex-grow'>";
                    
                    // encabezado
                    echo "<div class='mb-3'>";
                    echo "<h2 class='text-lg font-bold text-gray-800 mb-1 line-clamp-2'>{$nombre_juego}</h2>";
                    echo "<span class='text-xs font-semibold text-gray-500 bg-gray-100 px-2 py-1 rounded'>ID: {$id}</span>";
                    echo "</div>";
                    
                    // plataforma
                    echo "<p class='text-sm text-indigo-600 font-medium mb-3 flex-shrink-0'>";
                    echo "<span class='bg-indigo-100 px-2 py-1 rounded'>📱 {$plataforma}</span>";
                    echo "</p>";
                    
                    // descripción
                    echo "<p class='text-gray-700 text-sm leading-relaxed line-clamp-4 flex-grow'>{$descripcion}</p>";
                    
                    echo '</div>'; // cierre del div de contenido
                    echo '</div>'; // cierre del div principal de la card
                }
            } else {
                echo '<div class="col-span-full bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md shadow-sm">';
                echo '<p class="font-bold">Información</p>';
                echo '<p>No hay juegos registrados en la base de datos.</p>';
                echo '</div>';
            }
            ?>
        </div>
        
    </main>
</body>
</html>