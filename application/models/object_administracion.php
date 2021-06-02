<?php

class Administracion {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    function getAreas() {
        $query = "SELECT * FROM supermarket.area";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute() ? $stmt : 0;
    }

    /*function addPaciente() {
        $query = "INSERT INTO consultacmlamora.pacientemas
                  SET nombre = :nombre";
        
        $stmt = $this->conn->prepare($query);
        
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        
        $stmt->bindParam(":nombre", $this->nombre);

        return $stmt->execute();
    }*/
}

?>