$(document).ready(() => {
    verTabla()
    $('#table_listaProductos').on('draw.dt', function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    localStorage.removeItem('carrito')
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
                    "<i class='fas fa-shopping-cart' id='agregarBtn' style='cursor: pointer; padding: 3px; font-size: 20px; color: #372bb4;'></i>" +
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
        
        if (parseInt(data.cantidad) == 0) {
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

        if (parseInt($(this).val()) > parseInt(data.cantidad)) {
            swal({
                icon: 'warning',
                text: '¡No hay más productos!',
                buttons: false,
                timer: 2000
            })
            $(this).val(data.cantidad)
            return
        }

        if (parseInt($(this).val()) < 1) {
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
        var data = table.row($(this).parents('tr')).data()

        //var datos = $(this).siblings()[0].value
        var cantidad = $(this).parents('td').siblings()[5].children[0].value
        
        let cant = cantidad
        
        if(cantidad > 0) {
            //Agregar carrito
            let carrito = []
            var item = {
                "data": data,
                "cantidad": cantidad
            }

            carrito = JSON.parse(localStorage.getItem('carrito'))
            if(carrito == null)
                carrito = []
            else {
                for(cart of carrito) {
                    if(cart['data'].nombre == item['data'].nombre) {
                        cant = parseInt(cant) + parseInt(cart['cantidad'])
                    }
                }
            }
            if(parseInt(cant) > parseInt(data.cantidad)) {
                alert("CANTIDAD INSUFICIENTE")
                return
            }

            carrito.push(item)
            //Datos se van al localStorage
            localStorage.setItem('carrito', JSON.stringify(carrito));

            $.ajax({
                type: 'post',
                data: {carrito: carrito},
                url: 'application/controllers/caja/controller_addToCart.php',
                success: response => {
                    $('#carrito').empty()
                    $('#carrito').append(response)
                },
                error: () => {
                    toastr.error("Algo saló mal")
                }
            })
        }

    })
}

function getCarrito(){
    var carrito = localStorage.getItem('carrito');
    carrito = JSON.parse(carrito)

    $.ajax({
        type: 'post',
        data:{
            carrito: carrito
        },
        url: 'application/controllers/caja/controller_addToCart.php',
        success: (res) => {
            if (res == '1') {
                toastr.success("Producto añadido correctamente al carrito")
            } else
            toastr.error("Algo salió mal, intente de nuevo")
        }
    })
}