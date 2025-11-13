<?php
require_once "../entidades/User.php";
require_once "../middleWork/controlarSesiones.php";

if (!isset($_SESSION["datos"]["rol"]) || $_SESSION["datos"]["rol"] !== "Admin") {
    header("Location: ../index.php");
    exit();
}

$user = new User();
$users = $user->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Listado de Usuarios - Admin</title>
</head>
<body class="bg-gray-100 min-h-screen p-8">

    <main class="container mx-auto max-w-4xl">
        
        <h1 class="text-3xl font-extrabold text-gray-800 mb-6 border-b pb-2">Listado de Usuarios</h1>
        
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre de Usuario</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    
                    <?php 
                    // Muestra los datos en filas 
                    if (!empty($users)): 
                        foreach ($users as $u):
                    ?>
                        <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?php echo htmlspecialchars($u->id); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?php echo htmlspecialchars($u->nombre); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <?php 
                                    $rol_class = ($u->rol === 'Admin') ? 'bg-indigo-100 text-indigo-800' : 'bg-green-100 text-green-800';
                                    echo "<span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full {$rol_class}'>" . htmlspecialchars($u->rol) . "</span>";
                                ?>
                            </td>
                        </tr>
                    <?php 
                        endforeach; 
                    else:
                    ?>
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">No hay usuarios registrados.</td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
        
        <div class="mt-8">
            <button onclick="window.location.href='../vista/bienvenidoAdmin.php'"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded transition duration-200 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                ← Volver al Panel
            </button>
        </div>
        
    </main>

</body>
</html>
