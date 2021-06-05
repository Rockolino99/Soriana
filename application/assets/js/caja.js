$(document).ready(() => {
    verTabla()
    $('#table_listaProductos').on('draw.dt', function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
})

function validaCantidad(elemento,cantidad, existencia){
    
    if(existencia == 0) {
        swal({
            icon: 'info',
            text: '¡No quedan productos disponibles!',
            buttons: false,
            timer: 2000
        })
        $(elemento).val('0')
        return
    }
    if(isNaN(cantidad) || cantidad == ''){
        swal({
            icon: 'warning',
            text: '¡Debes elegir una cantidad valida!',
            buttons: false,
            timer: 2000
        })
        $(elemento).val('1')
        return
    }
    if(existencia<cantidad){
        swal({
            icon: 'warning',
            text: '¡No hay más prendas!',
            buttons: false,
            timer: 2000
        })
        $(elemento).val(existencia)
        return
    }
    if(cantidad<1){
        swal({
            icon: 'warning',
            text: '¡Debes elegir por lo menos una unidad!',
            buttons: false,
            timer: 2000
        })
        $(elemento).val('1')
        return
    }   
}
function verTabla() {
    var table = $('#table_listaProductos').DataTable({
        "ajax": {
            "url": "application/controllers/administracion/controller_getListaInventario.php"
        },
        "columns": [{
                "data": "idInventario"
            },
            {
                "data": "nombre"
            },
            {
                "data": "cantidad"
            },
            {
                "data": "precio"
            },
            {
                "data": "nomProveedor"
            },
            {
                "defaultContent": "<input type='number' class='form-controls' value='<?php echo $row[cantidad]>0? 1 : 0 ?> id='cantidadVP' style='width:70px;' required onchange='validaCantidad(this, $(this).val(),<?php echo $row[cantidad]; ?>)' onkeyup='validaCantidad(this, $(this).val(),<?php echo $row[cantidad]; ?>)'>"
            },
            {
                "defaultContent": "<div style='display: flex; flex-wrap: no-wrap; justify-content: center;'>" +
                    "<span data-toggle='tooltip' data-placement='top' title='Agragar'>" + //Agregar
                    "<i class='fas fa-shopping-cart' id='editBtn' style='cursor: pointer; padding: 3px; font-size: 20px;'></i>" +
                    "</span>" + "</div>"
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    })
    $("#table_listaProductos").css('width', '100%')
    //getDataEditar("#table_listaInventario tbody", table)
}


