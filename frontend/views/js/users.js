/**
 * Created by alejandro.chavez on 12/10/2018.
 */


function userRegister() {

    //User mail

    var email = $("#emailReg").val();

    if (email == '' || email == null) {

        swal({
            title: "¡Error en registro!",
            text: "Debes ingresar un email valido",
            type: "error",
            confirmButtonText: "Cerrar",
            closeOnConfirm: true
        });

        $("#emailReg").focus();

        /* $("#emailReg").parent().before('<div class="alert alert-warning"><strong>Debes ingresar un email valido</strong></div>');*/

        return false;

    } else {

        var pattern2 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if (!pattern2.test(email)) {

            swal({
                title: "¡Error en registro!",
                text: "Email de usuario no valido",
                type: "error",
                confirmButtonText: "Cerrar",
                closeOnConfirm: true
            });

            $("#emailReg").focus();


            /* $("#emailReg").parent().before('<div class="alert alert-warning"><strong>Email de usuario no valido</strong></div>');*/

            return false;
        }
    }

    //User pass


    var password = $("#regPass").val();

    if (password == '' || password == null) {

        swal({
            title: "¡Error en registro!",
            text: "Contraseña obligatoria",
            type: "error",
            confirmButtonText: "Cerrar",
            closeOnConfirm: true
        });

        $("#regPass").focus();

        /* $("#regPass").parent().before('<div class="alert alert-warning"><strong>Contraseña obligatoria</strong></div>');*/

        return false;

    } else {

        var pattern3 = /^[a-zA-Z0-9]*$/;

        if (!pattern3.test(password)) {

            swal({
                title: "¡Error en registro!",
                text: "Password de usuario no valida",
                type: "error",
                confirmButtonText: "Cerrar",
                closeOnConfirm: true
            });

            $("#regPass").focus();


            /*$("#regPass").parent().before('<div class="alert alert-warning"><strong>Contraseña de usuario no valido</strong></div>');*/

            return false;

        }
    }


    // User name

    var userName = $("#regUser").val();

    if (userName == '' || userName == null) {

        swal({
            title: "¡Error en registro!",
            text: "Debes ingresar un nombre valido",
            type: "error",
            confirmButtonText: "Cerrar",
            closeOnConfirm: true
        });


        $("#regUser").focus();

        /*$("#regUser").parent().before('<div class="alert alert-warning"><strong>Debes ingresar un nombre valido</strong></div>');*/
        return false;

    } else {

        var pattern = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!pattern.test(userName)) {

            swal({
                    title: "¡Error en registro!",
                    text: "Nombre de usuario no valido",
                    type: "error",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: true
                }
            );

            $("#regUser").focus();

            /* $("#regUser").parent().before('<div class="alert alert-warning"><strong>Nombre de usuario no valido</strong></div>');*/
            return false;

        }
    }

    //Validate policy terms

    var policy = $("#regTerms:checked").val();

    if (policy != "on") {

        swal({
                title: "¡Error en registro!",
                text: "Por favor, acepta los terminos y condiciones de uso",
                type: "error",
                confirmButtonText: "Cerrar",
                closeOnConfirm: true
            }
        );

        $("#regTerms").focus();
        /*  $("#regTerms").parent().before('<div class="alert alert-warning"><strong>Acepta los terminos y condiciones de uso</strong></div>');*/

        return false;
    }


    return true;
}