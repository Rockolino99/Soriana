<?php

class Proveedor {

    private $conn;

    public $nombre;

    public function __construct($db){
        $this->conn = $db;
    }

    function getProveedores() {
        $query = "SELECT * FROM supermarket.proveedor";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute() ? $stmt : 0;
    }

    function addProveedor() {
        $query = "INSERT INTO supermarket.proveedor
                  SET nombre = :nombre";
        
        $stmt = $this->conn->prepare($query);
        
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        
        $stmt->bindParam(":nombre", $this->nombre);

        return $stmt->execute() ? 1 : 0;
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