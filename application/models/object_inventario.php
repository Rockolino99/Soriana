<?php

class Inventario {

    private $conn;

    public $idInventario;
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

        $stmt->execute();
        return $stmt;
    }

    function updateInventario() {
        $query = "UPDATE supermarket.inventario
                  SET nombre = :nombre,
                      precio = :precio,
                      cantidad = :cantidad,
                      idProveedor = :idProveedor
                  WHERE idInventario = :idInventario";
        
        $stmt = $this->conn->prepare($query);
        
        $this->idInventario = htmlspecialchars(strip_tags($this->idInventario));
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->precio = htmlspecialchars(strip_tags($this->precio));
        $this->cantidad = htmlspecialchars(strip_tags($this->cantidad));
        $this->idProveedor = htmlspecialchars(strip_tags($this->idProveedor));
        
        $stmt->bindParam(":idInventario", $this->idInventario);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":cantidad", $this->cantidad);
        $stmt->bindParam(":idProveedor", $this->idProveedor);

        return $stmt->execute() ? 1 : 0;
    }

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

    function deleteInventario() {
        $query = "DELETE FROM supermarket.inventario
                    WHERE idInventario = :idInventario";

        $stmt = $this->conn->prepare($query);
                
        $this->idInventario = htmlspecialchars(strip_tags($this->idInventario));

        $stmt->bindParam(":idInventario", $this->idInventario);

        return $stmt->execute() ? 1 : 0;
    }
}

?>