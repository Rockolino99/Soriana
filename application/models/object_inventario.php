<?php

class Inventario {

    private $conn;

    public $nombre;
    public $cantidad;
    public $precio;
    public $idProveedor;

    public function __construct($db){
        $this->conn = $db;
    }

    function getInventario() {
        $query = "SELECT i.*, p.nombre AS nomProveedor
                    FROM supermarket.inventario i, supermarket.proveedor p
                    WHERE i.idProveedor = p.idProveedor";

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

    function addInventario() {
        $query = "INSERT INTO supermarket.inventario
                  SET nombre = :nombre,
                      precio = :precio,
                      cantidad = :cantidad,
                      idProveedor = :idProveedor";
        
        $stmt = $this->conn->prepare($query);
        
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->precio = htmlspecialchars(strip_tags($this->precio));
        $this->cantidad = htmlspecialchars(strip_tags($this->cantidad));
        $this->idProveedor = htmlspecialchars(strip_tags($this->idProveedor));
        
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":cantidad", $this->cantidad);
        $stmt->bindParam(":idProveedor", $this->idProveedor);

        return $stmt->execute() ? 1 : 0;
    }
}

?>