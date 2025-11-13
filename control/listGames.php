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

    <main class="container mx-auto max-w-4xl">
        
        <h1 class="text-3xl font-extrabold text-gray-800 mb-8 border-b pb-4">Listado de Juegos</h1>
        
        <div class="mt-8">
            <button onclick="window.location.href='../vista/bienvenidoAdmin.php'"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded transition duration-200 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                Volver
            </button>
        </div>

        <div class="space-y-6">
            <?php
            if (!empty($juegos)) {
                foreach ($juegos as $j) {
                    $nombre_juego = htmlspecialchars($j->nombre);
                    $plataforma = htmlspecialchars($j->plataforma);
                    $descripcion = htmlspecialchars($j->descripcion);
                    $id = htmlspecialchars($j->id);

                    echo '<div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition duration-300">';
                    
                    // encabezado
                    echo "<div class='flex justify-between items-center mb-2'>";
                    echo "<h2 class='text-xl font-bold text-gray-800'>{$nombre_juego}</h2>";
                    echo "<span class='text-sm font-semibold text-gray-600'>ID: {$id}</span>";
                    echo "</div>";

                    // plataforma
                    echo "<p class='text-sm text-indigo-600 font-medium mb-3'>Plataforma: {$plataforma}</p>";

                    // descripción
                    echo "<p class='text-gray-700 leading-relaxed'>Descripción: {$descripcion}</p>";
                    
                    echo '</div>';
                }
            } else {
                echo '<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md shadow-sm">';
                echo '<p class="font-bold">Información</p>';
                echo '<p>No hay juegos registrados en la base de datos.</p>';
                echo '</div>';
            }
            ?>
        </div>
        
    </main>

</body>
</html>