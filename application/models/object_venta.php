<?php

class Venta {

    private $conn;

    public $idVenta;
    public $idUsuario;
    public $fecha;
    public $total;

    public function __construct($db){
        $this->conn = $db;
    }

    function addVenta() {
        $query = "INSERT INTO supermarket.venta
                  SET idUsuario = :idUsuario,
                      fecha = :fecha";
        
        $stmt = $this->conn->prepare($query);
        
        $this->idUsuario = htmlspecialchars(strip_tags($this->idUsuario));
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));
        
        $stmt->bindParam(":idUsuario", $this->idUsuario);
        $stmt->bindParam(":fecha", $this->fecha);

        return $stmt->execute() ? $this->conn->lastInsertId() : 0;
    }

    function updateVenta() {
        $query = "UPDATE supermarket.venta
                  SET total = :total
                  WHERE idVenta = :idVenta";
        
        $stmt = $this->conn->prepare($query);
        
        $this->total = htmlspecialchars(strip_tags($this->total));
        $this->idVenta = htmlspecialchars(strip_tags($this->idVenta));
        
        $stmt->bindParam(":total", $this->total);
        $stmt->bindParam(":idVenta", $this->idVenta);

        return $stmt->execute() ? 1 : 0;
    }

}

?>