<?php
$subtotal = 0;
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
        foreach ($carrito as $item) {
            $producto = $item['data'];
            echo "<tr onclick='dropItem($producto[idInventario], \"$producto[nombre]\")'>";
            echo "<td>" . $producto['nombre'] . "</td>";
            echo "<td>" . $item['cantidad'] . "</td>";
            echo "<td>" . "$" . $producto['precio'] . "</td>";
            echo "</tr>";
            $subtotal += ($item['cantidad'] * $producto['precio']);
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
            <td colspan="2" id="final"><?php echo "$" . $subtotal ?></td>
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
</div>

<script>
    function dropItem(idProducto, nombre) {
        
        toastr.info(
            "<br/><div class='form-group'>" +
            "<input type='password' id='confPass' class='form-control' placeholder='Contraseña'>" + 
            "</div>",
            'Ingresar clave de encargado',
        {
            onShown: function(toast) {
                $("#confPass").keypress( event => {
                    if(event.key == 'Enter') {
                        //alert("salir")
                        //$("#confPass")
                        pass = $("#confPass").val()
                        setTimeout(() => {
                            $(this).closest('.toast').fadeOut();
                        }, 100);
                        toastr.info(pass)
                    }
                    /*$.ajax({
                        type: 'post',
                        data: {
                            idUsuario: i
                        },
                        url: 'application/controllers/administracion/controller_dropUser.php',
                        success: function(data) {
                            if (data == '1') {
                                toastr.success("Eliminación exitosa")
                                getUsersList()
                            } else
                                toastr.error("Algo salió mal, intente de nuevo")
                        }
                    })*/
                })
            } 
        })
    }

toastr.options = {
  "closeButton": false,
  "debug": true,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "10000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut",
  "tapToDismiss": false
}
</script>