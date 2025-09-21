<?php
    include "revisarLogin.php";
    include "../entidades/User.php";
    $nickname = $_POST["nickname"];
    $password = $_POST["password"];

    class UsuarioControlador{
        public static function validarLogin($nickname, $password){

            $obj_usuario = new User();
            $obj_usuario-> setNickname($nickname);
            $obj_usuario-> setPassword($password);

            UsuarioDao::login($obj_usuario);
            
        }
    }

    UsuarioControlador::validarLogin($nickname,$password);