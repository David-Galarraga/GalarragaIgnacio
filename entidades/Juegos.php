<?php
require_once "../datos/Database.php";
Class Juego{
    private $db;
    private $nombre;
    private $descripcion;
    private $thumbnail;
    private $plataforma;

    public function __construct(){
        $this->db = (new Database())->connect();
    }

    function addGame($nombre, $descripcion, $thumbnail, $plataforma){
        $sql = "INSERT INTO juegos (nombre, descripcion, thumbnail, plataforma) 
            VALUES (?, ?, ?, ?)";
        $stmt = $this-> db -> prepare($sql);
        $stmt -> execute([$nombre, $descripcion, $thumbnail, $plataforma]);
    }
    public function getAll() {
        $sql = "SELECT * FROM juegos";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
};

