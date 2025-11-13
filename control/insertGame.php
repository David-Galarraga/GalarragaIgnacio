<?php
require_once "../entidades/Juegos.php";
require_once "../middleWork/controlarSesiones.php";
if ($_SESSION["datos"]["rol"] !== "Admin") {
        header("Location: ../index.php");
        exit();
    }
$api = file_get_contents("../datos/Juegos.json");
$datos = json_decode($api, true);

$juego = new Juego();
$juego -> addGame($_POST["titulo"], $_POST["descripcion"], $_POST["thumbnail"], $_POST["plataforma"]);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="shortcut icon" href="../img/faviconVapourware.ico" type="image/x-icon">
    <title>Insertar juego</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">

    <div class="w-full max-w-md">
        
        <div class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4 border-t-4 border-green-500 text-center">
            
            <p class="text-green-600 text-2xl font-bold mb-4">Juego insertado con exito</p> <br>
            
            <button onclick="window.location.href='../vista/bienvenidoAdmin.php'"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer transition duration-300 ease-in-out w-full mt-4">
                Volver
            </button> <br>
            
        </div>
    </div>
</body>
</html>
