<?php

class Ticket {

    private $conn;

    public $idTicket;

    public $idVenta;
    public $idInventario;
    public $cantidad;

    public function __construct($db){
        $this->conn = $db;
    }

    function addTicket() {
        $query = "INSERT INTO supermarket.ticket
                  SET idVenta = :idVenta,
                      idInventario = :idInventario,
                      cantidad = :cantidad";
        
        $stmt = $this->conn->prepare($query);
        
        $this->idVenta = htmlspecialchars(strip_tags($this->idVenta));
        $this->idInventario = htmlspecialchars(strip_tags($this->idInventario));
        $this->cantidad = htmlspecialchars(strip_tags($this->cantidad));
        
        $stmt->bindParam(":idVenta", $this->idVenta);
        $stmt->bindParam(":idInventario", $this->idInventario);
        $stmt->bindParam(":cantidad", $this->cantidad);

        return $stmt->execute() ? 1 : 0;
    }

}

?>