$(document).ready(() => {
	getUsersAndPass()
})

function getUsersAndPass() {
    $.ajax({
        url: 'application/controllers/seguridad/controller_getUserAndPass.php',
        success: function(data) {
            $('tbody').append(data)
        }
    })
}