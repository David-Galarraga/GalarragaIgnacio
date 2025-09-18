<?php
require_once "Database.php";
class User {
    private $db;
    public function __construct() {
        $this->db = (new Database())->connect();
    }
    public function add($password, $nombre, $apellido, $nickname) {
        $sql = "INSERT INTO users (password, nombre, apellido, nickname) VALUES (:password, :nombre, :apellido, :nickname)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([`:password` => $password, `:nombre` => $nombre, `:apellido` => $apellido, `:nickname` => $nickname]);
    }
    public function getAll() {
        $sql = "SELECT * FROM usarios";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($id, $password, $nombre, $apellido, $nickname) {
        $sql = "UPDATE users SET password = :password, nombre = :nombre, apellido = :apellido, nickname = :nickname WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([`:password` => $password, `:nombre` => $nombre, `:apellido` => $apellido, `:nickname` => $nickname, ':id' => $id]);
    }
    public function delete($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
