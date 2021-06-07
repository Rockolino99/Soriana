<?php
$carrito = $_POST['carrito'];
foreach ($carrito as $item) {
    $producto = $item['data'];
    echo $producto['nombre'] . " " . $item['cantidad'] . " $" . $producto['precio'] . "<br><br>";
    //echo $item->data->idProducto;
}

?>