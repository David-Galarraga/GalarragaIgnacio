<?php
require_once "User.php";

Class Biblioteca{
    private User $user;
    private $db;

    function __construct(){
        $this->db = (new Database())->connect();
    }

    function getAll(){
        self::verificarUsuario($_SESSION["datos"]["id"]);
        $sql = "SELECT * FROM biblioteca";
        $stmt = $this-> db -> query($sql) ;
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } 

    private function verificarUsuario($userID){
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
    function create($userID){ //buscar al usuario
       
        
    }
}