<?php
$subtotal = 0;
if(isset($_POST['carrito']) && $_POST['carrito'] != []) {
    $carrito = $_POST['carrito'];
?>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($carrito as $item) {
            $producto = $item['data'];
            echo "<tr onclick='dropItem($i)'>";
            echo "<td>" . $producto['nombre'] . "</td>";
            echo "<td>" . $item['cantidad'] . "</td>";
            echo "<td>" . "$" . $producto['precio'] . "</td>";
            echo "</tr>";
            $subtotal += ($item['cantidad'] * $producto['precio']);
            $i++;
        }
        ?>
    </tbody>
</table>
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
            <td id="final"> <?php echo "$" . $total ?></td>
        </tr>
    </table>

    <button onclick="endVenta()" class="btn-finnish">FINALIZAR VENTA</button>
</div>

<?php
} else {
    echo "<h2>LISTA VACÍA</h2>";
}
?>