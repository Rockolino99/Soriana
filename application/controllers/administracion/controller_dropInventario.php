<?php
require_once('../../connection/connection_bd.php');
require_once('../../models/object_inventario.php');

$database = new Database();
$db = $database->getConnection();

$inventario = new Inventario($db);

$inventario->idInventario = $_POST['idInventario'];

echo $inventario->deleteInventario();

?>