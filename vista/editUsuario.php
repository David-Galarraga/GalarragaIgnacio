<?php
    include_once "../middleWork/controlarSesiones.php";
    if (!isset($_SESSION["datos"]["rol"]) || $_SESSION["datos"]["rol"] !== "Admin") {
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
    <title>Editar Usuario</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">
    
    <div class="w-full max-w-lg">
        
        <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Editar Usuario</h1>
        
        <form 
            method="post" 
            action="../control/edit.php"
            class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4"
        >

            <div class="mb-4">
                <label for="id" class="block text-gray-700 text-sm font-bold mb-2">ID del usuario a cambiar</label>
                <input 
                    name="id" 
                    type="number" 
                    required
                    placeholder="Escribe el ID (Ej: 5)"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input 
                    name="password" 
                    type="password" 
                    required
                    placeholder="Nueva contraseña"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                <input 
                    name="nombre" 
                    type="text" 
                    required
                    placeholder="Nuevo nombre"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-4">
                <label for="apellido" class="block text-gray-700 text-sm font-bold mb-2">Apellido</label>
                <input 
                    name="apellido" 
                    type="text" 
                    required
                    placeholder="Nuevo apellido"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input 
                    name="email" 
                    type="email" 
                    required
                    placeholder="Nuevo email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-6">
                <label for="rol" class="block text-gray-700 text-sm font-bold mb-2">Rol</label>
                <input 
                    name="rol" 
                    type="text" 
                    required
                    placeholder="Nuevo rol (Admin/usuario)"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="flex items-center justify-center mb-4">
                <input 
                    type="submit" 
                    value="Guardar Cambios"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer transition duration-300 ease-in-out w-full"
                >
            </div>
        </form>
        
        <div class="flex items-center justify-center">
            <button onclick="window.location.href='bienvenidoAdmin.php'"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-200 shadow-md w-full">
                Volver
            </button>
        </div>

    </div>
</body>
</html>