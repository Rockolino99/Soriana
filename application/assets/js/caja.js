$(document).ready(() => {
    verTabla()
    $('#table_listaProductos').on('draw.dt', function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
})

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
                "defaultContent": "<input type='number' class='form-controls' value='0' id='cantidadVP' style='width:70px;' required>"
            },
            {
                "defaultContent": "<div style='display: flex; flex-wrap: no-wrap; justify-content: center;'>" +
                    "<span data-toggle='tooltip' data-placement='top' title='Agregar'" + //Agregar
                    "<i class='fas fa-shopping-cart' id='agregarBtn' style='cursor: pointer; padding: 3px; font-size: 20px;'></i>" +
                    "</span>" + "</div>"
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    })
    $("#table_listaProductos").css('width', '100%')

    getDataProductos("#table_listaProductos tbody", table)
    getDataAgregarCarrito("#table_listaProductos tbody", table)
}

function getDataProductos(tbody, table) {
    $(tbody).on('change', '#cantidadVP', function () { //Editar
        var data = table.row($(this).parents('tr')).data()
        data.cantidad = parseInt(data.cantidad)
        cantidad = parseInt($(this).val())
        alert("Actual:" + cantidad + ", max: " + data.cantidad)
        if (data.cantidad == 0) {
            swal({
                icon: 'info',
                text: '¡No quedan productos disponibles!',
                buttons: false,
                timer: 2000
            })
            $(this).val('0')
            return
        }

        if (isNaN($(this).val()) || $(this).val() == '') {
            swal({
                icon: 'warning',
                text: '¡Debes elegir una cantidad valida!',
                buttons: false,
                timer: 2000
            })
            $(this).val('1')
            return
        }

        if (cantidad > data.cantidad) {
            alert(typeof $(this).val())
            alert(typeof data.cantidad)
            alert(cantidad > data.cantidad)
            swal({
                icon: 'warning',
                text: '¡No hay más productos!',
                buttons: false,
                timer: 2000
            })
            alert(data.cantidad)
            $(this).val(data.cantidad)
            return
        }

        if (cantidad < 1) {
            swal({
                icon: 'warning',
                text: '¡Debes elegir por lo menos un producto!',
                buttons: false,
                timer: 2000
            })
            $(this).val('1')
            return
        }

    })
}

function getDataAgregarCarrito(tbody, table) {
    $(tbody).on('click', '#agregarBtn', function () { //Agregar Cart
        var row = table.row($(this).parents('tr'))
        console.log("row:" + row)
        var data = table.row($(this).parents('tr')).data()
        //alert(":v")
        console.log(data)
        //Agregar carrito

        $('#nombreAgregar').val(data.nombre)
        $('#precioAgregar').val(data.precio)
        $('#cantidadAgregar').val(data.cantidad)
        $('#selectAgregar').val(data.idProveedor)

        idInventario = data.idInventario
    })
}

function updateCarrito() { //#carrito
    $.ajax({
        url: 'application/controllers/caja/controller_getNumCart.php',
        success: function (value) {
            $('#carrito').empty()
            $('#carrito').append(" " + value)
        }
    })
}

function verCarrito() {
    //bodyCarrito
    $.ajax({
        url: 'application/controllers/caja/controller_getCart.php',
        success: function (res) {
            $('#carrito').empty()
            $('#carrito').append(res)
        }
    })
}

$('#agregarBtn').on('click', function () {
    alert("hola mundo xD")
})