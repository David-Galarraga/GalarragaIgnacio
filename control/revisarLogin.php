<?php
    include_once "../datos\Database.php";
    
    class UsuarioDao extends Database{
        protected static $cnx;

        private static function getConexion(){
            self::$cnx = Database::connect();
        }
        private static function getDesconectar(){
            self::$cnx = null;
        }

        // login sirve para validar el login, lo hace mediante $query
        public static function login(User $obj_usuario){

            if(!$obj_usuario->getNickname()){
                return '';
            }
            
            $query = "SELECT id, password, nombre, apellido, nickname, rol, fecha_registro
                FROM usuarios
                WHERE nickname = :nickname";
                
            self::getConexion();


            $resultado = self::$cnx-> prepare($query);
            $resultado-> bindParam(":nickname", $_POST["nickname"]);
            $resultado-> execute();


            $logged = $resultado->fetch();

            if (!$logged) {
                echo '<div class="flex items-center justify-center h-screen bg-gray-100">';
                echo '<div class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4 w-full max-w-md text-center border-l-4 border-red-500">';
    
                echo '<p class="text-red-500 text-xl font-semibold mb-4">¡Error de inicio de sesión!</p>';
                echo '<p class="text-gray-700 mb-6">Contraseña o usuario no encontrado.</p>';
    
                $botonError = 'bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer transition duration-300 ease-in-out w-full';
    
                echo '<button onclick="window.location.href=\'../index.php\'" class="' . $botonError . '">Volver a intentar</button>';
    
                echo '</div>';
                echo '</div>'; 
    
                return false;
            }
             
            $verified = password_verify($obj_usuario ->getPassword(), $logged["password"]);
            // $verified verifica que la contraseña de ese usuario sea la que se ingreso cuando se loggeo
            if (!$verified) {
                echo '<div class="flex items-center justify-center h-screen bg-gray-100">';
                echo '<div class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4 w-full max-w-md text-center border-l-4 border-red-500">';
    
                echo '<p class="text-red-500 text-xl font-semibold mb-4">¡Error de inicio de sesión!</p>';
                echo '<p class="text-gray-700 mb-6">Contraseña o usuario no valido.</p>';
    
                $botonError = 'bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer transition duration-300 ease-in-out w-full';
    
                echo '<button onclick="window.location.href=\'../index.php\'" class="' . $botonError . '">Volver a intentar</button>';
    
                echo '</div>';
                echo '</div>';
    
                return false;
            }

            session_start();
            $datosSesion = array("id" => $logged["id"], "rol" => $logged["rol"]);
            $_SESSION["datos"] = $datosSesion;
 
            echo '<div class="flex items-center justify-center h-screen bg-gray-100">';
            echo '  <div class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4 w-full max-w-md text-center">';

            // mensaje de exito
            echo '<p class="text-green-600 text-2xl font-bold mb-4">¡Se inició correctamente!</p>';

            // muestra el id del usuario
            echo '<p class="text-gray-600 text-sm mb-6">ID de Sesión: ' . htmlspecialchars($_SESSION["datos"]["id"]) . '</p>';

            $botonContinuar = 'bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer transition duration-300 ease-in-out w-full';

            if ($logged["rol"] === "Admin") {
                echo '<button onclick="window.location.href=\'../vista/bienvenidoAdmin.php\'" class="' . $botonContinuar . '">Continuar al Panel de Administrador</button>';    
            } else if ($logged["rol"] === "usuario") {
                echo '<button onclick="window.location.href=\'../vista/bienvenidoUsuario.php\'" class="' . $botonContinuar . '">Continuar</button>';
            }

            echo '</div>';
            echo '</div>'; 

            return true;
            
            //Si se logra logear inicia la sesion y le carga los datos
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Ingresando</title>
</head>
<body>
    
</body>
</html>

