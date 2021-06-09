<?php
include_once '../../connection/connection_bd.php';
include_once '../../models/object_inventario.php';
include_once '../../models/object_venta.php';
include_once '../../models/object_ticket.php';

$database = new Database();
$db = $database->getConnection();

$inventario = new Inventario($db);
$venta = new Venta($db);
$ticket = new Ticket($db);

$carrito = $_POST['carrito'];

$venta->idUsuario = $_POST['idUsuario'];
$venta->fecha = date('Y-m-d');

$idVenta = $venta->addVenta();
$venta->idVenta = $idVenta;

$ticket->idVenta = $idVenta;

$total = 0;

foreach($carrito as $item) {

    $data = $item['data'];
    $cantidad = $item['cantidad'];

    $inventario->idInventario = $data['idInventario'];
    $inventario->cantidad = $cantidad;
    $inventario->restProductos();

    $ticket->idInventario = $data['idInventario'];
    $ticket->cantidad = $cantidad;
    $ticket->addTicket();

    $total += $cantidad * $data['precio'];

}

$venta->total = $total;
$venta->updateVenta();

echo '1';
?>