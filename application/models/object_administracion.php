<?php

class Administracion {

    private $conn;

    public $idUsuario;
    public $nombre;
    public $user;
    public $idArea;

    public function __construct($db){
        $this->conn = $db;
    }

    function getAreas() {
        $query = "SELECT * FROM supermarket.area";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute() ? $stmt : 0;
    }

    function addUsuario() {
        $query = "INSERT INTO supermarket.usuario
                  SET nombre = :nombre,
                      user = :user,
                      idArea = :idArea";
        
        $stmt = $this->conn->prepare($query);
        
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->user = htmlspecialchars(strip_tags($this->user));
        $this->idArea = htmlspecialchars(strip_tags($this->idArea));
        
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":user", $this->user);
        $stmt->bindParam(":idArea", $this->idArea);

        return $stmt->execute() ? 1 : 0;
    }

    function getUsersList() {
        $query = "SELECT idUsuario, nombre FROM supermarket.usuario";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute() ? $stmt : 0;
    }

    function dropUser() {
        $query = "DELETE FROM supermarket.usuario
                  WHERE idUsuario = :idUsuario";
        
        $stmt = $this->conn->prepare($query);
        
        $this->idUsuario = htmlspecialchars(strip_tags($this->idUsuario));
        
        $stmt->bindParam(":idUsuario", $this->idUsuario);

        return $stmt->execute() ? 1 : 0;
    }
}

?>