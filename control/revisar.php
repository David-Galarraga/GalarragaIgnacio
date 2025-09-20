<?php
    include "../datos/Database.php";

    class UsuarioDao extends Database{
        protected static $cnx;
        private static function getConexion(){
            self::$cnx = Database::connect();
        }
        private static function getDesconectar(){
            self::$cnx = null;
        }

        public static function login(){

        }
    }
    
   
   /* session_start();

    if (isset($nickname)) {
        
    }else {
        $nickname = $_POST["nickname"];
        var_dump($nickname);
    };
    
    
    if (isset($password)) {
        
    }else {
        $password = $_POST["password"];
        var_dump($password);
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
</body>
</html> */
