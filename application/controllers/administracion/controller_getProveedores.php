<?php
require_once('../../connection/connection_bd.php');
require_once('../../models/object_proveedor.php');

$database = new Database();
$db = $database->getConnection();

$proveedor = new Proveedor($db);

$stmt = $proveedor->getProveedores();
?>
<option value="0" disabled selected>Seleccione</option>
<?php
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <option value="<?php echo $row['idProveedor']; ?>"><?php echo $row['nombre']; ?></option>
<?php }
?>