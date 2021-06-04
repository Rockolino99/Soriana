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

	username = $('#username')
	if(username.val() == '' || username.val() == null) {
		alertify.error("Ingrese un nombre de usuario")
		username.focus()
		return
	}
	if(username.val().indexOf(' ') > -1) {
		alertify.error("El nombre de usuario no puede tener espacios")
		username.focus()
		return
	}

	area = $('#selectArea').find(":selected")
	if(area.val() == 0) {
		alertify.error("Seleccione un area")
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
		//Nel >:v
	});
}