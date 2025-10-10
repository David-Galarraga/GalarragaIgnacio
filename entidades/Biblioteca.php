<?php

use BcMath\Number;

require_once "User.php";

Class Biblioteca{
    private User $user;
    private $id;


    function __construct(){
         $this -> user = new User();
    }

    private function verificarUsuario(Number $userID){
        $user = $this -> user -> getByID($userID);
        if (!$user) {
            echo "Usuario no encontrado";
            return false;
        }
        if (!$this -> user -> getRol() === User::ROL_USUARIO){
            echo "Este usuario no es valido";
            return false;
        }
    }
    function create(Number $userID){ //buscar al usuario
       
        
    }
}