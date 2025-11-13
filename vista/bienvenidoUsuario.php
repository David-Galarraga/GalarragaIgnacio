<?php
    include_once "../middleWork/controlarSesiones.php";
    if (!$_SESSION["datos"]["rol"] === "usuario") {
        header("Location: ../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Inicio Usuario</title>
</head>
<body class="bg-gray-100 min-h-screen">
    
    <header class="bg-white shadow-md p-4 flex justify-between items-center sticky top-0 z-10"> 
        <h1 class="text-xl font-bold text-gray-800">Panel de Usuario</h1>
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

    <main class="container mx-auto p-6 flex justify-center items-start pt-16">
        
        <div class="w-full max-w-sm">
            <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-8">Bienvenido Usuario</h1>

            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <button onclick="window.location.href='juegosBibliotecas.php'"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 shadow-lg focus:outline-none focus:ring-4 focus:ring-indigo-500 w-full text-lg">
                    Ir a Mi Biblioteca
                </button> <br>
            </div>
        </div>
        
    </main>
    
</body>
</html>