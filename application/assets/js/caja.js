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
                    "<i class='fas fa-shopping-cart' id='AgregarBtn' style='cursor: pointer; padding: 3px; font-size: 20px;'></i>" +
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
        //alert("Actual:" + $(this).val() + ", max: " + data.cantidad)
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

        if ($(this).val() > data.cantidad) {
            swal({
                icon: 'warning',
                text: '¡No hay más productos!',
                buttons: false,
                timer: 2000
            })
            $(this).val(data.cantidad)
            return
        }

        if ($(this).val() < 1) {
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

function getDataAgregarCarrito(tbody, table){
    $(tbody).on('click', '#AgregarBtn', function () {//Agregar Cart
        alert(":v") 
		var data = table.row($(this).parents('tr')).data()
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

$('#AgregarBtn').on('click', function () {
    //alert(":v")
   alert("hola mundo xD")
})