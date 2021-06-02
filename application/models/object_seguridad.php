<?php

class Seguridad {

    private $conn;

    //Nuevo usuario
    /*public $nombre;
    public $user;
    public $idArea;*/

    public function __construct($db){
        $this->conn = $db;
    }

    function getUsers() {
        $query = "SELECT * FROM supermarket.usuario";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute() ? $stmt : 0;
    }

    /*function addUsuario() {
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
    }*/
}

?>