<?php
require_once "../datos/Database.php";

Class Biblioteca{
    private $db;
    private $id;

    function __construct(){
        $this->db = (new Database())->connect();
    }

    function getID($idUsuario){
        $sqlGetBibliotecaId = "SELECT id FROM biblioteca WHERE id_usuario = :id";
    	$stmtGetBibliotecaId = $this->db->prepare($sqlGetBibliotecaId);
    	$stmtGetBibliotecaId->execute([":id" => $idUsuario]);
    	$bibliotecaId = $stmtGetBibliotecaId->fetchColumn();
        $this-> id = $bibliotecaId;
        return $this -> id;
    }

    function deleteGame($idGame, $idBiblioteca){
        $sql = "DELETE FROM bibliotecas_juegos
            WHERE id_juego = :idGame AND id_biblioteca = :idBiblioteca";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":idGame" => $idGame, ":idBiblioteca" => $idBiblioteca]);
    } 

    public function getGames($idBiblioteca){
        $sql = "SELECT id_juego 
            FROM bibliotecas_juegos 
            WHERE id_biblioteca  = :idBiblioteca" ;
        $stmt = $this-> db -> prepare($sql);
        $stmt -> execute(['idBiblioteca' => $idBiblioteca]);
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function addGame($idBibliotecas, $idJuegos) {
        
		$sql = "INSERT INTO bibliotecas_juegos (id_biblioteca, id_juego) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
		$stmt->execute([$idBibliotecas, $idJuegos]); 
	}    

    public function getGamesDetails($idBiblioteca){
        $sql = <<<SQL
            SELECT j.id, j.nombre, j.descripcion, j.thumbnail, j.plataforma 
            FROM juegos as j
            INNER JOIN bibliotecas_juegos as bj ON j.id = bj.id_juego
            WHERE bj.id_biblioteca = :idBiblioteca
        SQL;
        
        $stmt = $this->db->prepare($sql);
        $stmt -> execute(['idBiblioteca' => $idBiblioteca]); 

        // Regresa un array asociativo con los detalles de cada juego.
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
/*
    public function getGames($idBiblioteca){
        $sql = "SELECT id_juego FROM bibliotecas_juegos WHERE $idBiblioteca = :id_biblioteca";
        $stmt = $this -> db -> prepare($sql);
        $stmt -> execute([$sql]);
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
*/
}


?>