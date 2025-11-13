<?php
    include_once "../middleWork/controlarSesiones.php";
    if ($_SESSION["datos"]["rol"] !== "Admin") {
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
    <link rel="shortcut icon" href="../img/faviconVapourware.ico" type="image/x-icon">
    <title>Panel de Administración</title>
</head>
<body class="bg-gray-100 min-h-screen">
    
    <header class="bg-white shadow-md p-4 flex justify-between items-center sticky top-0 z-10">
        <h1 class="text-xl font-bold text-gray-800">Panel Admin</h1>
        <nav class="space-x-4">
            <button onclick="window.location.href='bienvenidoAdmin.php'"
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
        
        <p class="text-3xl font-extrabold text-gray-800 mb-8 border-b pb-2">Bienvenido Admin!</p>

        <div class="flex flex-wrap -mx-4">
            
            <div class="w-full md:w-1/2 px-4 mb-6">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">Gestión de Usuarios</h2>
                    <div class="space-y-3">
                        <button onclick="window.location.href='../control/listar.php'"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200 shadow-md">
                            Listar Usuarios
                        </button>
                        <button onclick="window.location.href='insertarUsuario.php'"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-200 shadow-md">
                            Insertar Usuarios
                        </button>
                        <button onclick="window.location.href='editUsuario.php'"
                            class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded transition duration-200 shadow-md">
                            Editar Usuarios
                        </button>
                        <button onclick="window.location.href='deleteUsuario.php'"
                            class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition duration-200 shadow-md">
                            Eliminar Usuarios
                        </button>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 px-4 mb-6">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">Gestión de Juegos</h2>
                    <div class="space-y-3">
                        <button onclick="window.location.href='../control/listGames.php'"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded transition duration-200 shadow-md">
                            Listar Juegos
                        </button>
                        <button onclick="window.location.href='insertarJuego.php'"
                            class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded transition duration-200 shadow-md">
                            Insertar Juego
                        </button>
                        <button onclick="window.location.href='editJuego.php'"
                            class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded transition duration-200 shadow-md">
                            Editar Juego
                        </button>
                        <button onclick="window.location.href='deleteJuego.php'"
                            class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition duration-200 shadow-md">
                            Eliminar Juego
                        </button>
                    </div>
                </div>
            </div>

        </div> </main>

</body>
</html>
