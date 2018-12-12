/**
 * Created by alejandro.chavez on 12/11/2018.
 */
$(".facebook").click(function () {

    console.log("click");

    FB.login(function (response) {
        validateUser();
    }, {scope: 'public_profile, email'})
});

/*Validate login*/

function validateUser() {

    FB.getLoginStatus(function (response) {

        statusChangeCallback(response);

    });

}

function statusChangeCallback(response) {

    if (response.status === 'connected') {

        testApi();

    } else {

        swal({
            title: "¡Error en registro!",
            text: "Error al ingresar con Facebook",
            type: "error",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
        }, function (isConfirm) {

            if (isConfirm) {

                window.location = localStorage.getItem("actualPath");

            }

        });

    }

}


/*Api facebook*/

function testApi() {

    FB.api('/me?fields=id,name,email,picture', function (response) {

        if (response.email == null) {

            swal({
                title: "¡Error en registro!",
                text: "Para poder ingresar es necesario proporcionar la informacion de email",
                type: "error",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false
            }, function (isConfirm) {

                if (isConfirm) {

                    window.location = localStorage.getItem("actualPath");

                }

            });

        } else {

            var emailFB = response.email;
            console.log('emailfb', emailFB);

            var nameFB = response.name;
            console.log('namefb', nameFB);
            var picture = "http://graph.facebook.com/" + response.id + "/picture?type=large";

            console.log('picture', picture);

            var data = new FormData();

            data.append("email", emailFB);
            data.append("name", nameFB);
            data.append("picture", picture);

            $.ajax({

                url: pathFrontEnd + "ajax/usersAjax.php",
                method: "POST",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {

                    if (response == 'ok') {

                        window.location = localStorage.getItem("actualPath");

                    } else {

                        swal({
                            title: "¡Error en registro!",
                            text: "Este email " + emailFB + " ya esta registrado con otro metodo de ingreso",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }, function (isConfirm) {

                            if (isConfirm) {

                                FB.getLoginStatus(function (response) {

                                    if(response.status === 'connected'){

                                        FB.logout(function (response) {

                                            deleteCookie("203597013913742");
                                            setTimeout(function () {
                                                window.location = pathFrontEnd+ "logout";
                                            }, 500)

                                        });

                                        function deleteCookie(){
                                            document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                                        }

                                    }

                                });

                            }

                        });
                    }
                }

            });

        }


    });
}

$(".logout").click(function (e) {
    e.preventDefault();

    FB.getLoginStatus(function (response) {

        if(response.status === 'connected'){

            FB.logout(function (response) {

                deleteCookie("203597013913742");
                setTimeout(function () {
                    window.location = pathFrontEnd+ "logout";
                }, 500)

            });

            function deleteCookie(){
                document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            }

        }

    });
});