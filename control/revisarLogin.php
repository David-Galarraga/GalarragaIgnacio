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

        // login: metodo que sirve para validar el login, lo hace mediante peticiones (query)
        public static function login(User $obj_usuario){

            if(!$obj_usuario->getNickname()){
                return '';
            }
            
            $query = "SELECT id, nombre, apellido, nickname, rol, fecha_registro
                FROM usuarios
                WHERE nickname = :nickname AND password = :password";
            self::getConexion();


            $resultado = self::$cnx-> prepare($query);
            $resultado-> bindParam(":nickname", $_POST["nickname"]);
            $resultado-> bindParam(":password", $_POST["password"]);
            $resultado-> execute();
            $logged = $resultado->fetch();
            
            //Si se logra logear inicia la sesion y le carga los datos

            if ($logged) { //si se logra logear se guardan sus datos para la sesion
                session_start();
                $datosSesion = array("id" => $logged["id"], "rol" => $logged["rol"]);
                $_SESSION["datos"] = $datosSesion;

                echo "Se inicio correctamente! <br>";
                
                if ($logged["rol"] === "Admin") {
                    echo "<button onclick=\"window.location.href='../vista/bienvenidoAdmin.php'\">Continuar</button>";    
                } else if ($logged["rol"] === "usuario") {
                    echo "<button onclick=\"window.location.href='../vista/bienvenidoUsuario.php'\">Continuar</button>";
                }
                
                return true;
            }else{
                echo "Error! contraseña o usuario no encontrado! <br>";
                echo "<button onclick=\"window.location.href='../index.php'\">Volver</button>";
                return false;
            }

        }
    }
?>

