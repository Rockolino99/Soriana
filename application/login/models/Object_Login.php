<?php
//include_once "../connection/Object_Connection.php";

class Login {
    private $conn;

    public $user;
    public $pass;

    function __construct($db) {
        $this->conn = $db;
    }

    function login() {
        $query = "SELECT *
                  FROM supermarket.usuario
                  WHERE user = :user";

        $stmt = $this->conn->prepare($query);

        $this->user = htmlspecialchars(strip_tags($this->user));
        
        $stmt->bindValue(":user", $this->user);

        if(!$stmt->execute())
            return 0;
        else {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$row)
                return 0;//No hay usuario registrado
            else {
                if($row['pass'] == null)
                        return 3; //Sin contraseña
                        
                if($this->pass == $row['pass']) {
                    session_start();
                    $_SESSION['idUsuario'] = $row['idUsuario'];
                    $_SESSION['idArea'] = $row['idArea'];
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['user'] = $row['user'];

                    return 1;//Inicio de sesión
                }
                return -1;//Contraseña incorrecta
            }
        }
    }

}
?>