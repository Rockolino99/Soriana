<?php

class Inventario {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    function getInventario() {
        $query = "SELECT * FROM supermarket.inventario";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute() ? $stmt : 0;
    }

    /*function setPass() {
        $query = "UPDATE supermarket.usuario
                  SET pass = :pass
                  WHERE idUsuario = :idUsuario";
        
        $stmt = $this->conn->prepare($query);
        
        $this->pass = htmlspecialchars(strip_tags($this->pass));
        $this->idUsuario = htmlspecialchars(strip_tags($this->idUsuario));
        
        $stmt->bindParam(":pass", $this->pass);
        $stmt->bindParam(":idUsuario", $this->idUsuario);

        return $stmt->execute() ? 1 : 0;
    }*/

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