<?php

class Carrito {
    private $conn;

    public $idCarrito;

    public $nombre;
    public $cantidad;
    public $precio;
    public $imagen;
    public $idInventario;
    public $idCategoria;

    function __construct($db) {
        $this->conn = $db;
    }

    function addCarrito() {
        
        $query = "INSERT INTO supermarket.carrito
                  SET
                  nombre = :nombre,
                  cantidad = :cantidad,
                  precio = :precio,
                  imagen = :imagen,
                  idInventario = :idInventario,
                  idCategoria = :idCategoria";

        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->cantidad = htmlspecialchars(strip_tags($this->cantidad));
        $this->precio = htmlspecialchars(strip_tags($this->precio));
        $this->imagen = htmlspecialchars(strip_tags($this->imagen));
        $this->idInventario = htmlspecialchars(strip_tags($this->idInventario));
        $this->idCategoria = htmlspecialchars(strip_tags($this->idCategoria));
        
        $stmt->bindValue(":nombre", $this->nombre);
        $stmt->bindValue(":cantidad", $this->cantidad);
        $stmt->bindValue(":precio", $this->precio);
        $stmt->bindValue(":imagen", $this->imagen);
        $stmt->bindValue(":idInventario", $this->idInventario);
        $stmt->bindValue(":idCategoria", $this->idCategoria);

        if($stmt->execute())
            return $this->conn->lastInsertId();
        else
            return 0; 

    }

    function getCarrito() {
        $query = "SELECT *
                  FROM supermarket.carrito";

        $stmt = $this->conn->prepare($query);

        if($stmt->execute())
            return $stmt;
        else
            return 0;
    }
    
    function deleteCarrito() {
        $query = "DELETE
                  FROM supermarket.carrito
                  WHERE idCarrito = :idCarrito";

        $stmt = $this->conn->prepare($query);

        $this->idCarrito = htmlspecialchars(strip_tags($this->idCarrito));

        $stmt->bindParam(":idCarrito", $this->idCarrito);

        if($stmt->execute())
            return 1;
        else
            return 0;
    }

    function deleteAllCarrito() {
        $query = "DELETE
                  FROM supermarket.carrito
                  WHERE idCarrito > 0";

        $stmt = $this->conn->prepare($query);

        if($stmt->execute())
            return 1;
        else
            return 0;
    }

    function getNumCarrito() {

        $query = "SELECT SUM(cantidad)
                  AS cantidad
                  FROM supermarket.carrito";

        $stmt = $this->conn->prepare($query);

        if($stmt->execute())
            return $stmt;
        else
            return '0';
    }
}
?>