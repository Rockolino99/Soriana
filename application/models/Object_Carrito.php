<?php

class Carrito {
    private $conn;

    public $pass;

    function __construct($db) {
        $this->conn = $db;
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

}
?>