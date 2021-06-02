<?
class Paciente {

    private $conn;

    public $idpacientemas;
    public $nombre;
    public $calle;
    public $numero;
    public $colonia;
    public $municipio;
    public $direstado;
    public $tel;
    public $cel;
    public $email;
    public $tipopx;
    public $estado;
    public $parejasexual;//id
    public $fechanacimiento;
    public $idmedicoreferidor;
    public $contra;
    public $puntos;
    public $esposa;//nombre
    public $statuscodigoBC;

    public $fecha;
    public $comentario;

    public $prename;

    public function __construct($db){
        $this->conn = $db;
    }

    function getNombres() {
        $query = "SELECT m.idpacientemas, m.nombre, f.nombre AS pareja, m.tipopx, m.cel, m.email, TIMESTAMPDIFF(YEAR, m.fechanacimiento, CURDATE()) AS edad
                  FROM consultacmlamora.pacientemas m
                  LEFT JOIN consultacmlamora.paciente f
                  ON f.idpaciente = m.parejasexual
                  WHERE m.estado = 1";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    function getParejas() {
        $query = "SELECT idpaciente, nombre
                  FROM consultacmlamora.paciente
                  WHERE nombre LIKE '%". $this->prename ."%'
                  ORDER BY nombre";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    
    function addPaciente() {
        $query = "INSERT INTO consultacmlamora.pacientemas
                  SET nombre = :nombre,
                  calle = :calle,
                  numero = :numero,
                  colonia = :colonia,
                  municipio = :municipio,
                  direstado = :direstado,
                  tel = :tel,
                  cel = :cel,
                  email = :email,
                  tipopx = :tipopx,
                  estado = :estado,
                  parejasexual = :parejasexual,
                  fechanacimiento = :fechanacimiento,
                  idmedicoreferidor = :idmedicoreferidor,
                  contra = :contra,
                  puntos = :puntos,
                  esposa = :esposa";
        
        $stmt = $this->conn->prepare($query);
        
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->calle = htmlspecialchars(strip_tags($this->calle));
        $this->numero = htmlspecialchars(strip_tags($this->numero));
        $this->colonia = htmlspecialchars(strip_tags($this->colonia));
        $this->municipio = htmlspecialchars(strip_tags($this->municipio));
        $this->direstado = htmlspecialchars(strip_tags($this->direstado));
        $this->tel = htmlspecialchars(strip_tags($this->tel));
        $this->cel = htmlspecialchars(strip_tags($this->cel));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->tipopx = htmlspecialchars(strip_tags($this->tipopx));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->parejasexual = htmlspecialchars(strip_tags($this->parejasexual));
        $this->idmedicoreferidor = htmlspecialchars(strip_tags($this->idmedicoreferidor));
        $this->contra = htmlspecialchars(strip_tags($this->contra));
        $this->puntos = htmlspecialchars(strip_tags($this->puntos));
        $this->esposa = htmlspecialchars(strip_tags($this->esposa));
        
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":calle", $this->calle);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":colonia", $this->colonia);
        $stmt->bindParam(":municipio", $this->municipio);
        $stmt->bindParam(":direstado", $this->direstado);
        $stmt->bindParam(":tel", $this->tel);
        $stmt->bindParam(":cel", $this->cel);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":tipopx", $this->tipopx);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":parejasexual", $this->parejasexual);
        $stmt->bindParam(":fechanacimiento", $this->fechanacimiento);
        $stmt->bindParam(":idmedicoreferidor", $this->idmedicoreferidor);
        $stmt->bindParam(":contra", $this->contra);
        $stmt->bindParam(":puntos", $this->puntos);
        $stmt->bindParam(":esposa", $this->esposa);

        return $stmt->execute();
    }

    function getDataPx() {
        $query = "SELECT m.*, p.nombre AS pareja, TIMESTAMPDIFF(YEAR, m.fechanacimiento, CURDATE()) AS edad
                FROM 
                    (SELECT m.*, med.nombre AS nombreMedico
                    FROM consultacmlamora.pacientemas m
                    LEFT JOIN consultacmlamora.medicosexternos med
                    ON m.idmedicoreferidor = med.idmedicoexterno) m
                LEFT JOIN consultacmlamora.paciente p
                ON p.idpaciente = m.parejasexual
                WHERE m.idpacientemas = :idpacientemas";

        $stmt = $this->conn->prepare($query);

        $this->idpacientemas = htmlspecialchars(strip_tags($this->idpacientemas));
        
        $stmt->bindParam(":idpacientemas", $this->idpacientemas);

        $stmt->execute();

        return $stmt;
    }

    function deletePaciente() {
        $query = "UPDATE consultacmlamora.pacientemas
                  SET estado = 0
                  WHERE idpacientemas = :idpacientemas";
        
        $stmt = $this->conn->prepare($query);
        
        $this->idpacientemas = htmlspecialchars(strip_tags($this->idpacientemas));
        $stmt->bindParam(":idpacientemas", $this->idpacientemas);

        return $stmt->execute()? 1 : 0;
    }

    function editPaciente() {
        $query = "UPDATE consultacmlamora.pacientemas
                  SET nombre = :nombre,
                  calle = :calle,
                  numero = :numero,
                  colonia = :colonia,
                  municipio = :municipio,
                  direstado = :direstado,
                  tel = :tel,
                  cel = :cel,
                  email = :email,
                  tipopx = :tipopx,
                  estado = :estado,
                  parejasexual = :parejasexual,
                  fechanacimiento = :fechanacimiento,
                  idmedicoreferidor = :idmedicoreferidor,
                  contra = :contra,
                  puntos = :puntos,
                  esposa = :esposa
                  WHERE idpacientemas = :idpacientemas";
        
        $stmt = $this->conn->prepare($query);
        
        $this->idpacientemas = htmlspecialchars(strip_tags($this->idpacientemas));
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->calle = htmlspecialchars(strip_tags($this->calle));
        $this->numero = htmlspecialchars(strip_tags($this->numero));
        $this->colonia = htmlspecialchars(strip_tags($this->colonia));
        $this->municipio = htmlspecialchars(strip_tags($this->municipio));
        $this->direstado = htmlspecialchars(strip_tags($this->direstado));
        $this->tel = htmlspecialchars(strip_tags($this->tel));
        $this->cel = htmlspecialchars(strip_tags($this->cel));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->tipopx = htmlspecialchars(strip_tags($this->tipopx));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->parejasexual = htmlspecialchars(strip_tags($this->parejasexual));
        $this->idmedicoreferidor = htmlspecialchars(strip_tags($this->idmedicoreferidor));
        $this->contra = htmlspecialchars(strip_tags($this->contra));
        $this->puntos = htmlspecialchars(strip_tags($this->puntos));
        $this->esposa = htmlspecialchars(strip_tags($this->esposa));
        
        $stmt->bindParam(":idpacientemas", $this->idpacientemas);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":calle", $this->calle);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":colonia", $this->colonia);
        $stmt->bindParam(":municipio", $this->municipio);
        $stmt->bindParam(":direstado", $this->direstado);
        $stmt->bindParam(":tel", $this->tel);
        $stmt->bindParam(":cel", $this->cel);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":tipopx", $this->tipopx);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":parejasexual", $this->parejasexual);
        $stmt->bindParam(":fechanacimiento", $this->fechanacimiento);
        $stmt->bindParam(":idmedicoreferidor", $this->idmedicoreferidor);
        $stmt->bindParam(":contra", $this->contra);
        $stmt->bindParam(":puntos", $this->puntos);
        $stmt->bindParam(":esposa", $this->esposa);

        return $stmt->execute();
    }

    function getComentarios() {
        $query = "SELECT c.*, u.nombre
        FROM consultacmlamora.comentarios_pxandro c
        LEFT JOIN consultacmlamora.usuario u
        ON c.idusuario = u.idusuario
        WHERE c.idpacientemas = :idpacientemas";

        $stmt = $this->conn->prepare($query);

        $this->idpacientemas = htmlspecialchars(strip_tags($this->idpacientemas));
        
        $stmt->bindParam(":idpacientemas", $this->idpacientemas);

        $stmt->execute();

        return $stmt;
    }

    function setComentario() {
        $query = "INSERT INTO consultacmlamora.comentarios_pxandro
                  SET idpacientemas = :idpacientemas,
                  fecha = :fecha,
                  comentario = :comentario";
        
        $stmt = $this->conn->prepare($query);
        
        $this->idpacientemas = htmlspecialchars(strip_tags($this->idpacientemas));
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));
        $this->comentario = htmlspecialchars(strip_tags($this->comentario));
        
        $stmt->bindParam(":idpacientemas", $this->idpacientemas);
        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":comentario", $this->comentario);

        return $stmt->execute();
    }
}
?>