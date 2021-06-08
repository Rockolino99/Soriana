<?php
$subtotal = 0;
$carrito = $_POST['carrito'];
?>

<?php
echo "<table>";
echo "<tr><th>Nombre</th><th>Cantidad</th><th>Precio</th></tr>";
foreach ($carrito as $item) {
    echo "<tr>";
    $producto = $item['data'];
    echo "<td>" . $producto['nombre'] . "</td>";
    echo "<td>" . $item['cantidad'] . "</td>";
    echo "<td>" . "$" . $producto['precio'] . "</td>";
    //echo $item->data->idProducto;
    echo "</tr>";
    $subtotal += ($item['cantidad'] * $producto['precio']);
}
echo "</table>";
?>
<div>
    <br>
    <hr>
    <table id="tabla-final">
        <tr>
           <td>Subtotal:</td>
           <td></td>
           <td id="final"><?php echo "$" . $subtotal ?></td>
        </tr>
        <tr>
            <td>IVA: </td>
            <td></td>
            <?php $iva =  $subtotal * 0.16; ?>
            <td id="final"><?php echo "$" . $iva ?></td>
        </tr>
        <tr>
            <td>Total: </td>
            <td></td>
            <?php $total =  $subtotal + $iva; ?>
            <td id="final"> <?php echo "$" . $total?></td>
        </tr>
    </table>
</div>
