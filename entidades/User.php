<?php
require_once "../datos/Database.php";
class User {
    private $db;
    private $id;
    private $password;
    private $nombre;
    private $apellido;
    private $nickname;
    private $rol;
    private $fecha_registro;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function getNickname(){
		return $this->nickname;
	}

	public function setNickname($nickname){
		$this->nickname = $nickname;
	}

	public function getRol(){
		return $this->rol;
	}

	public function setRol($rol){
		$this->rol = $rol;
	}

	public function getFecha_registro(){
		return $this->fecha_registro;
	}

	public function setFecha_registro($fecha_registro){
		$this->fecha_registro = $fecha_registro;
	}
    
    public function __construct() {
        $this->db = (new Database())->connect();
    }
    public function add($password, $nombre, $apellido, $nickname, $rol) {
        $sql = "INSERT INTO users (password, nombre, apellido, nickname, rol) VALUES (:password, :nombre, :apellido, :nickname. :rol)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([`:password` => $password, `:nombre` => $nombre, `:apellido` => $apellido, `:nickname` => $nickname, `:rol` => $rol]);
    }
    public function getAll() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($id, $password, $nombre, $apellido, $nickname, $rol) {
        $sql = "UPDATE users SET password = :password, nombre = :nombre, apellido = :apellido, nickname = :nickname, rol = :rol WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([`:password` => $password, `:nombre` => $nombre, `:apellido` => $apellido, `:nickname` => $nickname, `:rol` => $rol , ':id' => $id]);
    }
    public function delete($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
