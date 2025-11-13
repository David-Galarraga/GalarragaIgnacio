<?php
    include_once "../middleWork/controlarSesiones.php";
    include_once "../entidades/User.php";
    if ($_SESSION["datos"]["rol"] !== "Admin") {
        header("Location: ../index.php");
        exit();
    }
    $user = new User();
    $usersNicknames = $user -> getNicknames();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="shortcut icon" href="../img/faviconVapourware.ico" type="image/x-icon">
    <title>Eliminar Usuario</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">
    
    <div class="w-full max-w-sm">
        
        <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Eliminar Usuario</h1>
        
        <form 
            method="post" 
            action="../control/delete.php"
            class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4 border-t-4 border-red-500"
        >

            <div class="mb-6">
                <label for="selectNickname" class="block text-gray-700 text-sm font-bold mb-2">Seleccione un usuario</label>
                
                <select 
                    name="nickname"
                    required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-red-500"
                >
                    <option value="" disabled selected>Seleccionar usuario</option>
                    <?php
                        if (!empty($usersNicknames)) {
                            foreach ($usersNicknames as $nick) {
                                echo "<option value=\"{$nick}\" >{$nick}</option>";
                            }
                        } else {
                            echo "<option value=\"\" disabled>No hay usuarios para mostrar</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="flex items-center justify-center mb-4">
                <input 
                    type="submit" 
                    value="Eliminar Usuario"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer transition duration-300 ease-in-out w-full"
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