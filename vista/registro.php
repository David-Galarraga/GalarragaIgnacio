<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="shortcut icon" href="../img/faviconVapourware.ico" type="image/x-icon">
    <title>Registrarse</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-sm">
        <form 
            method="post" 
            action="../control/verifyAccountCreation.php"
            class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4"
        >
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Registrarse</h2>

            <div class="mb-4">
                <label 
                    for="nombre" 
                    class="block text-gray-700 text-sm font-bold mb-2"
                >Nombre
                </label>
                <input 
                    name="nombre" 
                    type="text" 
                    required
                    placeholder="Introduce tu nombre"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-4">
                <label 
                    for="apellido" 
                    class="block text-gray-700 text-sm font-bold mb-2"
                >Apellido
                </label>
                <input 
                    name="apellido" 
                    type="text" 
                    required
                    placeholder="Introduce tu apellido"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-4">
                <label 
                    for="nickname" 
                    class="block text-gray-700 text-sm font-bold mb-2"
                >Nickname
                </label>
                <input 
                    name="nickname" 
                    type="text" 
                    required
                    placeholder="Introduce tu nickname"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-6">
                <label 
                    for="password" 
                    class="block text-gray-700 text-sm font-bold mb-2">Contraseña
                </label>
                <input 
                    name="password" 
                    type="password" 
                    required
                    placeholder="********"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="flex items-center justify-center">
                <input 
                    type="submit" 
                    value="Registrar"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer transition duration-300 ease-in-out w-full"
                >
            </div>
        </form>

        <p class="text-center text-gray-500 text-xs">
            &copy;2025 Vapourware. Todos los derechos reservados.
        </p>
</body>
</html>