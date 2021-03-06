(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function () {
        $(this).on('blur', function () {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            } else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('#loginBtn').on('click', function () {
        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }
        if (check) {
            return login(input[0].value, input[1].value)
        }
        return false
    });


    $('.validate-form .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }

    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function () {
        if (showPass == 0) {
            $(this).next('input').attr('type', 'text');
            $(this).addClass('active');
            showPass = 1;
        } else {
            $(this).next('input').attr('type', 'password');
            $(this).removeClass('active');
            showPass = 0;
        }

    });


})(jQuery);

function login(name, pass) {
    $.ajax({
        type: 'POST',
        data: {
            user: name,
            pass: pass,
        },
        url: "application/login/controllers/controller_Login.php",
        success: function (result) {
            switch (result) {
                case '1': //Inicio de sesi??n
                    toastr.success('Bienvenido')
                    setTimeout(() => {
                        location.assign('index.php?mod=caja')
                    }, 1000);
                    break
                case '-1': //Contrase??a incorrecta
                    toastr.error('La contrase??a es incorrecta')
                    break
                case '0': //No hay usuario registrado
                    toastr.warning('El usuario no est?? registrado')
                    break
                case '3': //Sin contrase??a
                    toastr.info('El usuario no tiene contrase??a. Solicite una a seguridad')
                    break
            }
        }
    })
    return false

}