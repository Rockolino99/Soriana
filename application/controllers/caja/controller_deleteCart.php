<?php

include_once '../../connection/Object_Connection.php';
include_once '../../models/Object_Carrito.php';

$database = new Database();
$db = $database->getConnection();

$carrito = new Carrito($db);

$carrito->idCarrito = $_POST['idCarrito'];

echo $carrito->deleteCarrito();

?>