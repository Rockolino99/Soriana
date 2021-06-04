<?php

class Seguridad {

    private $conn;

    public $pass;
    public $idUsuario;

    public function __construct($db){
        $this->conn = $db;
    }

    function getUsers() {
        $query = "SELECT * FROM supermarket.usuario";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute() ? $stmt : 0;
    }

    function setPass() {
        $query = "UPDATE supermarket.usuario
                  SET pass = :pass
                  WHERE idUsuario = :idUsuario";
        
        $stmt = $this->conn->prepare($query);
        
        $this->pass = htmlspecialchars(strip_tags($this->pass));
        $this->idUsuario = htmlspecialchars(strip_tags($this->idUsuario));
        
        $stmt->bindParam(":pass", $this->pass);
        $stmt->bindParam(":idUsuario", $this->idUsuario);

        return $stmt->execute() ? 1 : 0;
    }

}

?>