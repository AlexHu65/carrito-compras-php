/**
 * Created by alejandro.chavez on 12/10/2018.
 */

$(document).ready(function () {
    $('#img-user-data').change(function (evt) {

    });
});

/*Local storage */

var actualPath = location.href;
var userContactData = '';

$(".btn-login , .facebook , .google2").click(function () {

    localStorage.setItem("actualPath", actualPath)


});

idUser = '';

$("#profile-info").click(function () {

    var id_user = $("#id_user").val();
    idUser = id_user;

    $.ajax({
        url: pathFrontEnd + "ajax/usersAjax.php",
        method: "POST",
        data: {"idUser": id_user},
        cache: false,
        success: function (response) {


            userContactData = response;

            $("#edit-tel").val(JSON.parse(response).tel1);
            $("#edit-tel2").val(JSON.parse(response).tel2);
            $("#edit-direction").val(JSON.parse(response).street);
            $("#edit-colonia").val(JSON.parse(response).neighborhood);
            $("#edit-references").val(JSON.parse(response).referencesDirection);
            $("#edit-zip").val(JSON.parse(response).zip);

        }
    });

});


var validateEmail = false;


$("#emailReg").change(function () {


    var email = $("#emailReg").val();


    var data = new FormData();

    data.append("validateMail", email);

    $.ajax({
        url: pathFrontEnd + "ajax/usersAjax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {

            console.log('response users: ', response);

            if (response == "false") {

                validateEmail = true;

            } else {

                var mode = JSON.parse(response).modo;

                if (mode == "direct") {
                    mode = "email desde esta pagina";
                }

                swal({
                        title: "¡Error en registro!",
                        text: "Correo electronico en uso, intente con uno distinto. Registrado a traves de  " + mode,
                        type: "error",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: true
                    }
                );

                $("#emailReg").val("");
                validateEmail = false;

            }

        }
    })

});

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

            return false;
        }

        if (!validateEmail) {

            swal({
                    title: "¡Error en registro!",
                    text: "Correo electronico en uso, intente con uno distinto",
                    type: "error",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: true
                }
            );

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

        return false;
    }

    return true;


}

$("#updateUser-form").submit(function (e) {

    e.preventDefault(); // Prevent Default Submission / Inputs prevent default

    var data = $(this).serialize();

    $.ajax({
        url: pathFrontEnd + "ajax/usersAjax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        processData: false,
        success: function (response) {


            if (response == 'ok') {
                swal({
                    title: "¡Exito!",
                    text: "Datos guardados con exito",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        window.location = pathFrontEnd + "profile";
                    }
                });

            } else {
                swal({
                    title: "¡ERROR!",
                    text: "¡Error al actualizar sus datos!",
                    type: "error",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        window.location = pathFrontEnd + "profile";
                    }
                });

            }

        }
    });


});


/*Update profile picture*/
/*
 $("#change-img-profile").click(function () {

 $("#change-img-profile").toggle();
 $("#upload-img").toggle();


 });*/

var userImgData = '';


$("#img-user-data").change(function () {


    var imgUser = this.files[0];
    userImgData = imgUser;


    /*Validate format*/

    if (imgUser["type"] != 'image/jpeg' && imgUser["type"] != 'image/png') {

        console.log(imgUser['type']);

        $("#img-user-data").val("");

        swal({
                title: "¡Error en seleccionar el archivo!",
                text: "Formato de archivo no valido , intentalo con uno diferente",
                type: "error",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false
            }
        );

        $("#update-img").css({opacity: "0"});

    } else if (Number(imgUser["size"]) > (2000 * 1024)) {

        $("#img-user-data").val("");

        swal({
                title: "¡Error en seleccionar el archivo!",
                text: "La imagen de perfil no debe pesar mas de 2 mb",
                type: "error",
                confirmButtonText: "Cerrar",
                closeOnConfirm: true
            }
        );

        $("#update-img").css({opacity: "0"});

    } else {

        var imgData = new FileReader;
        imgData.readAsDataURL(imgUser);
        $(imgData).on("load", function (event) {

            var urlImg = event.target.result;
            $("#profile-img").attr("src", urlImg);
            $("#update-img").css({opacity: "1"});

        });

    }
});


$("#update-img").click(function (e) {

    e.preventDefault();

    var fd = new FormData();

    var file = $("#img-user-data")[0].files[0];

    fd.append('file', file);
    fd.append('user', idUser);

    $.ajax({
        url: pathFrontEnd + "ajax/updateAjaxPicture.php",
        method: "POST",
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {


            if (response == 'ok') {

                swal({
                        title: "¡Informacion actualizada!",
                        text: "Foto de usuario actualizada correctamente",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location = pathFrontEnd + "profile";
                        }
                    });

            } else {

                swal({
                        title: "¡Error al actualizar informacion!",
                        text: "Algo salio mal al ingresar nueva imagen de perfil",
                        type: "error",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location = pathFrontEnd + "profile";
                        }
                    });

            }
        }

    })


});

$("#user-comment-button").click(function () {

    var idUser = $(this).attr('idUser');
    var idProduct = $(this).attr('idProduct');

   $("#idUserComment").attr("value" , idUser);
   $("#idProductComment").attr("value" , idProduct);


});




