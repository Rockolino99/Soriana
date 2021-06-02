<?php
class Database {

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "supermarket";
    private $username = "root";
    private $password = "";
    private static $instancia;
    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("SET CHARACTER SET utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

    public function __construct()
    {
        try {
 
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("SET CHARACTER SET utf8");
 
        } catch (PDOException $exception) {
 
            print "Error!: " . $exception->getMessage();
 
            die();
        }
    }

    public static function singleton_conexion() {
 
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
 
        }
 
        return self::$instancia;
        
    }

    public function prepare($sql)
    {
 
        return $this->conn->prepare($sql);
 
    }


}
