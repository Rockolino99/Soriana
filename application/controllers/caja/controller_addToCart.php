<?php
include_once '../../connection/Object_Connection.php';
include_once '../../models/Object_Carrito.php';

$database = new Database();
$db = $database->getConnection();

$carrito = new Carrito($db);

$carrito->nombre = $_POST['nombre'];
$carrito->cantidad = $_POST['cantidad'];
$carrito->precio = $_POST['precio'];
$carrito->idInventario = $_POST['idInventario'];

echo $carrito->addCarrito();//retorna ultimo id insertado

?>