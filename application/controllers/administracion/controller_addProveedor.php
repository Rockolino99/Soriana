<?
include_once '../../connection/connection_bd.php';
include_once '../../models/object_proveedor.php';

$database = new Database();
$db = $database->getConnection();

$proveedor = new Proveedor($db);

$proveedor->nombre = $_POST['nombre'];

echo $proveedor->addProveedor();

?>