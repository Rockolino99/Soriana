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
			} else
				alertify.error("Algo salió mal, intente de nuevo")
		}
	})
}

function toLowerCase(username) {
	$(username).val($(username).val().toLowerCase())
}