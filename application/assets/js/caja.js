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
                "defaultContent": "<input type='number' class='form-controls' value='0' min='0' id='cantidadVP' style='width:70px;' required)'>"
            },
            {
                "defaultContent": "<div style='display: flex; flex-wrap: no-wrap; justify-content: center;'>" +
                    "<span data-toggle='tooltip' data-placement='top' title='Agragar'" + //Agregar
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
}

function getDataProductos(tbody, table) {
    $(tbody).on('change', '#cantidadVP', function () { //Editar
		var data = table.row($(this).parents('tr')).data()
        alert("Actual:" + $(this).val() + ", max: " + data.cantidad)
    })
}

function updateCarrito() { //#carrito
    $.ajax({
        url: 'application/controllers/caja/controller_getNumCart.php',
        success: function(value) {
            $('#carrito').empty()
            $('#carrito').append(" " + value)
        }
    })
}

function verCarrito() {
    //bodyCarrito
    $.ajax({
        url: 'application/controllers/caja/controller_getCart.php',
        success: function(res) {
            $('#carrito').empty()
            $('#carrito').append(res)
        }
    })
}

$('#AgregarBtn').on('click', function () {
	$.ajax({
		type: 'post',
		data: {
			idInventario: idInventario,
			nombre: nombre.val(),
			cantidad: cantidad.val(),
			precio: precio.val(),
            piezas: piezas.val(),
			idProveedor: proveedor.val()
		},
		url: 'application/controllers/administracion/controller_addToCart.php',
		success: (res) => {
			if (res == '1') {
				alertify.success("Producto añadido correctamente al carrito")
				$("#table_listaProductos").dataTable().fnDestroy();
				document.getElementById('table_listaProductos').removeChild(document.getElementById('table_listaProductos').lastChild)
				setTimeout(() => {
                    verCarrito()
					updateCarrito()
				}, 1200)
			} else
				alertify.error("Algo salió mal, intente de nuevo")
		}
	})
})

