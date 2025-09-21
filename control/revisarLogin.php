<?php
    include_once "../datos\Database.php";

    $nickname = $_POST["nickname"];
    $password = $_POST["password"];
    
    class UsuarioDao extends Database{
        protected static $cnx;

        private static function getConexion(){
            self::$cnx = Database::connect();
        }
        private static function getDesconectar(){
            self::$cnx = null;
        }

        // login: metodo que sirve para validar el login
        public static function login(User $obj_usuario){
            
            $query = "SELECT id, nombre, apellido, nickname, rol, fecha_registro
                FROM usuarios
                WHERE nickname = :nickname AND password = :password";
            self::getConexion();


            $resultado = self::$cnx-> prepare($query);
            $resultado-> bindParam(":nickname", $_POST["nickname"]);
            $resultado-> bindParam(":password", $_POST["password"]);
            $resultado-> execute();
            $logged = $resultado->fetch();
            
            if ($logged) {
                echo "Se inicio correctamente!";
                var_dump($logged);
                echo "<button onclick=\"window.location.href='../vista/bienvenido.php'\">Continuar</button>";
                return true;
            }else{
                echo "Error! contraseña o usuario no encontrado! <br>";
                echo "<button onclick=\"window.location.href='../index.php'\">Volver</button>";
                return false;
            }

        }
    }
?>

