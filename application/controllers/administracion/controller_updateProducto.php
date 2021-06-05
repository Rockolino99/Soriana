<?php
require_once('../../connection/connection_bd.php');
require_once('../../models/object_inventario.php');

$database = new Database();
$db = $database->getConnection();

$inventario = new Inventario($db);

$inventario->idInventario = $_POST['idInventario'];
$inventario->nombre = $_POST['nombre'];
$inventario->cantidad = $_POST['cantidad'];
$inventario->precio = $_POST['precio'];
$inventario->idProveedor = $_POST['idProveedor'];

echo $inventario->updateInventario();

?>