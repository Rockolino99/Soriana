<?php
include_once '../../connection/Object_Connection.php';
include_once '../../models/Object_Carrito.php';

$database = new Database();
$db = $database->getConnection();

$carrito = new Carrito($db);

$stmt = $carrito->getNumCarrito();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row['cantidad'] == null)
    echo 0;
else
    echo $row['cantidad'];

?>