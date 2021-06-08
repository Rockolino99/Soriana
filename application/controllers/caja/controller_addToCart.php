<h2>:v</h2>
<?php
$subtotal =0;
$carrito = $_POST['carrito'];
?>

<?php
foreach ($carrito as $item) {
    $producto = $item['data'];
    echo $producto['nombre'] . " " . $item['cantidad'] . " $" . $producto['precio'] . "<br><br>";
    //echo $item->data->idProducto;

    $subtotal += ($item['cantidad']*$item['precio']);
}
?>
<div>
    <span style="font-size: 15px;">Subtotal: <?php echo $subtotal ?></span>
</div>