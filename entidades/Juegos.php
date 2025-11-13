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
    public function getNames() {
        $sql = "SELECT nombre FROM juegos";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getID($nomb) {
        $sql = "SELECT id FROM juegos WHERE nombre = :nombre";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":nombre" => $nomb]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $sqlBibliotecasJuegos = "DELETE FROM bibliotecas_juegos WHERE id_juego = :id";
        $stmtBiliotecasJuegos = $this-> db -> prepare($sqlBibliotecasJuegos);
        $stmtBiliotecasJuegos -> execute([":id" => $id]);

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

