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
    <title>Insertar Juego</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">
    
    <div class="w-full max-w-lg">
        
        <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Insertar un nuevo juego</h1> <br>
        
        <form method="post" action="../control/insertGame.php" class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4">
            
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Titulo</label> <br>
                <input name="titulo" type="text" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"> <br>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripcion</label> <br>
                <input name="descripcion" type="text" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"> <br>
            </div>

            <div class="mb-4">
                <label for="thumbnail" class="block text-gray-700 text-sm font-bold mb-2">Thumbnail</label> <br>
                <input name="thumbnail" type="text" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"> <br>
            </div>

            <div class="mb-6">
                <label for="plataforma" class="block text-gray-700 text-sm font-bold mb-2">Plataforma</label> <br>
                <input name="plataforma" type="text" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"> <br>
            </div>

            <div class="flex items-center justify-center mb-4">
                <input type="submit" value="enviar" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer transition duration-300 ease-in-out w-full"> <br>
            </div>
        </form>
        
        <div class="flex items-center justify-center">
            <button onclick="window.location.href='bienvenidoAdmin.php'" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-200 shadow-md w-full">Volver</button>
        </div>

    </div>
</body>
</html>