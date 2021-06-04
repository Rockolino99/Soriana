(function($) {

	var tabs =  $(".tabs li a");
	var tabs2 =  $(".tabs2 li a");

	tabs.click(function() {
		var content = this.hash.replace('/','');
		tabs.removeClass("active");
		$(this).addClass("active");
    $("#content").find('section').hide();
    $(content).fadeIn(200);
	});

	tabs2.click(function() {
		var content = this.hash.replace('/','');
		tabs2.removeClass("active");
		$(this).addClass("active");
    $("#content2").find('section').hide();
    $(content).fadeIn(200);
	});

})(jQuery);

$(document).ready(() => {
	getAreas()
	getUsersList()
	getProveedores()
	verTabla()
	$('#table_listaInventario').on('draw.dt', function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
})

function getAreas() {
	$.ajax({
		url: 'application/controllers/administracion/controller_getAreas.php',
		success: function(data) {
			$('#selectArea').append(data)
		}
	})
}

function validateUser() {
	nombre = $('#nombreUser')
	if(nombre.val() == '' || nombre.val() == null) {
		alertify.error("Ingrese un nombre")
		nombre.focus()
		return
	}
	if(nombre.val().trim().length < 1) {
		alertify.error("Ingrese un nombre válido")
		nombre.focus()
		nombre.val('')
		return
	}

	username = $('#username')
	if(username.val() == '' || username.val() == null) {
		alertify.error("Ingrese un nombre de usuario")
		username.focus()
		return
	}

	if(username.val().trim().length < 1) {
		alertify.error("Ingrese un nombre de usuario válido")
		username.focus()
		username.val('')
		return
	}

	if(username.val().indexOf(' ') > -1) {
		alertify.error("El nombre de usuario no puede tener espacios")
		username.focus()
		return
	}

	area = $('#selectArea').find(":selected")
	if(area.val() == 0) {
		alertify.error("Seleccione un área")
		$('#selectArea').focus()
		return
	}

	$.ajax({
		type: 'post',
		data: {
			nombre: nombre.val(),
			user: username.val(),
			idArea: area.val()
		},
		url: 'application/controllers/administracion/controller_newUsuario.php',
		success: (res) => {
			if(res) {
				alertify.success("Usuario registrado correctamente")
				$(nombre).val('')
				$(username).val('')
				$('#selectArea').val(0)
				getUsersList()
			} else
				alertify.error("Algo salió mal, intente de nuevo")
		}
	})
}

function toLowerCase(username) {
	$(username).val($(username).val().toLowerCase())
}

function getUsersList() {
	$.ajax({
		url: 'application/controllers/administracion/controller_getUsersList.php',
		success: function(data) {
			$('#usersList').empty()
			$('#usersList').append(data)
		}
	})
}

function dropUser(i) {
	alertify.confirm('Eliminar usuario', '¿Desea eliminar a ' + $('#user' + i).text() + '?',
	function() {//Yes
		$.ajax({
			type: 'post',
			data: {idUsuario: i},
			url: 'application/controllers/administracion/controller_dropUser.php',
			success: function(data) {
				if(data == '1') {
					alertify.success("Eliminación exitosa")
					getUsersList()
				} else
					alertify.error("Algo salió mal, intente de nuevo")
			}
		})
	}, function(){
		//Nel
	});
}

function verTabla() {

	var table = $('#table_listaInventario').DataTable({
		"ajax": {
			"method": "POST",
			"url": "application/controllers/administracion/controller_getListaInventario.php"
		},
		"columns": [
			{
				"data": "nombre"
			},
			{
				"data": "precio"
			},
			{
				"data": "cantidad"
			},
			{
				"data": "nomProveedor"
			},
			{
				"defaultContent": "<div style='display: flex; flex-wrap: no-wrap; justify-content: center;'>" +
					"<span data-toggle='tooltip' data-placement='top' title='Editar Paciente'>" +//Editar
						"<a id='editBtn' style='cursor: pointer; padding: 3px;'>" +
							"<img src='#'></img>" +
						"</a>" +
					"</span>" +
					"<span data-toggle='tooltip' data-placement='top' title='Eliminar Paciente'>" +
						"<a id='deleteBtn' style='cursor: pointer; padding: 3px;'>" +
							"<img src='#'></img>" +
						"</a>" +
					"</span>" +
					"</div>"
			}
		],
		"language": {
			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		}
	})
	getDataEditar("#table_listaInventario tbody", table)
	//this.getDataEliminar("#table_listaInventario tbody", table)
}

function getDataEditar(tbody, table) {
	$(tbody).on('click', '#editBtn', function () {//Editar
		var data = table.row($(this).parents('tr')).data()
		alert(data.idInventario)
	})
}

$('#validateProveedor').on('click', function() {
	nombre = $('#newProveedor')

	if(nombre.val() == '' || nombre.val() == null) {
		nombre.focus()
		alertify.error("Ingrese un nombre")
		return
	}
	if(nombre.val().trim().length < 1) {
		nombre.focus()
		nombre.val('')
		alertify.error("Ingrese un nombre válido")
		return
	}

	$.ajax({
		type: 'post',
		data: {nombre: nombre.val()},
		url: 'application/controllers/administracion/controller_addProveedor.php',
		success: function(data) {
			if(data == '1') {
				alertify.success("Se agregó correctamente")
				nombre.val('')
				getProveedores()
			} else
				alertify.error("Algo salió mal, intente de nuevo")
		}
	})
})

$('#newInventarioBtn').on('click', function() {
	nombre = $('#nombreProducto')

	if(nombre.val() == '' || nombre.val() == null) {
		alertify.error("Ingrese un nombre")
		nombre.focus()
		return
	}
	if(nombre.val().trim().length < 1) {
		alertify.error("Ingrese un nombre válido")
		nombre.focus()
		nombre.val('')
		return
	}

	precio = $('#precioProducto')

	if(precio.val() <= 0 || precio.val() == null) {
		alertify.error("Ingrese un precio")
		precio.focus()
		precio.val(1)
		return
	}

	if(isNaN(precio.val())) {
		alertify.error("Ingrese un precio válido")
		precio.focus()
		precio.val(1)
		return
	}

	cantidad = $('#cantidadProducto')

	if(cantidad.val() <= 0 || cantidad.val() == null) {
		alertify.error("Ingrese una cantidad")
		cantidad.focus()
		cantidad.val(1)
		return
	}

	if(isNaN(cantidad.val())) {
		alertify.error("Ingrese una cantidad válida")
		cantidad.focus()
		cantidad.val(1)
		return
	}

	proveedor = $('#selectProveedor').find(':selected')
	if(proveedor.val() == 0) {
		alertify.error("Seleccione un proveedor")
		$('#selectProveedor').focus()
		return
	}

	$.ajax({
		type: 'post',
		data: {
			nombre: nombre.val(),
			cantidad: cantidad.val(),
			precio: precio.val(),
			idProveedor: proveedor.val()
		},
		url: 'application/controllers/administracion/controller_newProducto.php',
		success: (res) => {
			if(res) {
				alertify.success("Producto registrado correctamente")
				$(nombre).val('')
				$(precio).val('')
				$(cantidad).val('')
				$('#selectProveedor').val(0)
				verTabla()
			} else
				alertify.error("Algo salió mal, intente de nuevo")
		}
	})
})


function getProveedores() {
	$.ajax({
		url: 'application/controllers/administracion/controller_getProveedores.php',
		success: data => {
			$('#selectProveedor').empty()
			$('#selectProveedor').append(data)
		}
	})
}