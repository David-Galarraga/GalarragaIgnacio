<?php
require_once "../datos/Database.php";
Class Juego{
    private $db;

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
    public function delete($id) {
        $sql = "DELETE FROM juegos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":id" => $id]);
    }
    public function update($id, $nombre, $descripcion, $thumbnail, $plataforma) {
        $sql = "UPDATE juegos SET nombre = :nombre, descripcion = :descripcion, thumbnail = :thumbnail, plataforma = :plataforma WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":id" => $id, ":nombre" => $nombre, ":descripcion" => $descripcion, ":thumbnail" => $thumbnail, ":plataforma" => $plataforma]);
    }
};

