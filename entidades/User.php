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
	public const ROL_USUARIO = "usuario";
	public const ROL_ADMIN = "Admin";
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
		$sql = "INSERT INTO usuarios (password, nombre, apellido, nickname, rol) VALUES (?, ?, ?, ?, ?)";
		//:password, :nombre, :apellido, :nickname, :rol Solucionar
        $stmt = $this->db->prepare($sql);
		$stmt->execute([$password, $nombre, $apellido, $nickname, $rol]);
		/*solucionado, si en values le paso las posiciones con '?', 
		entonces en execute le paso directamente las variables: $password, $nombre, etc;
		sino le paso:
		$stmt->execute([`:password` => $password, `:nombre` => $nombre, `:apellido` => $apellido, `:nickname` => $nickname, `:rol` => $rol]); */ 
	}
    public function getAll() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function update($id, $password, $nombre, $apellido, $nickname, $rol) {
        $sql = "UPDATE usuarios SET password = :password, nombre = :nombre, apellido = :apellido, nickname = :nickname, rol = :rol WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":password" => $password, ":nombre" => $nombre, ":apellido" => $apellido, ":nickname" => $nickname, ":rol" => $rol , ':id' => $id]);
    }
    public function delete($id) {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":id" => $id]);
    }
	public function getByID(int $id){
		$sql = "SELECT * FROM usuarios WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		$stmt->execute([":id" => $id]);
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
}