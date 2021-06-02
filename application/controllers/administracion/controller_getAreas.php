<?php
require_once('../../connection/connection_bd.php');
require_once('../../models/object_administracion.php');

$database = new Database();
$db = $database->getConnection();

$admin = new Administracion($db);

$stmt = $admin->getAreas();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <option value="<?php echo $row['idArea']; ?>"><?php echo $row['nombre']; ?></option>
<?php }
?>