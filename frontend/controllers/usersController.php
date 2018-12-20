<?php

class usersController
{

    /**
     * User register
     */

    public function ctrRegisterUser()
    {

        if (isset($_POST['regUser'])) {

            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUser"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailReg"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPass"])
            ) {

                $passwordCrypt = crypt($_POST['regPass'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $encriptarEmail = md5($_POST['emailReg']);


                $data = [
                    'name' => $_POST['regUser'],
                    'password' => $passwordCrypt,
                    'email' => $_POST['emailReg'],
                    'mode' => 'direct',
                    'picture' => '',
                    'verify' => 1,
                    'emailcrypt' => $encriptarEmail
                ];

                $table = 'usuarios';
                $response = usersModel::sqlRegisterUser($table, $data);

                if ($response == 'ok') {

                    echo '<script> 

							swal({
								  title: "¡OK!",
								  text: "Se ha registrado con exito",
								  type:"success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';


                    /*Verify email*/
                    /* date_default_timezone_set("America/Monterrey");

                     $url = routing::selectRouteFrontEnd();


                     $mail = new PHPMailer;

                     $mail->CharSet = 'UTF-8';

                     $mail->isMail();

                     $mail->setFrom('cursos@tutorialesatualcance.com', 'Tutoriales a tu Alcance');

                     $mail->addReplyTo('cursos@tutorialesatualcance.com', 'Tutoriales a tu Alcance');

                     $mail->Subject = "Por favor verifique su dirección de correo electrónico";

                     $mail->addAddress($_POST["emailReg"]);

                     $mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

                         <center>

                             <img style="padding:20px; width:10%" src="http://tutorialesatualcance.com/tienda/logo.png">

                         </center>

                         <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">

                             <center>

                             <img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-email.png">

                             <h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>

                             <hr style="border:1px solid #ccc; width:80%">

                             <h4 style="font-weight:100; color:#999; padding:0 20px">Para comenzar a usar su cuenta de Tienda Virtual, debe confirmar su dirección de correo electrónico</h4>

                             <a href="' . $url . 'verificar/' . $encriptarEmail . '" target="_blank" style="text-decoration:none">

                             <div style="line-height:60px; background:#0aa; width:60%; color:white">Verifique su dirección de correo electrónico</div>

                             </a>

                             <br>

                             <hr style="border:1px solid #ccc; width:80%">

                             <h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

                             </center>

                         </div>

                     </div>');

                     $send = $mail->Send();

                     if (!$send) {

                         echo '<script>

                             swal({
                                   title: "¡ERROR!",
                                   text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a ' . $_POST["emailReg"] . '  ' . $mail->ErrorInfo . '!",
                                   type:"error",
                                   confirmButtonText: "Cerrar",
                                   closeOnConfirm: false
                                 },

                                 function(isConfirm){

                                     if(isConfirm){
                                         history.back();
                                     }
                             });

                         </script>';

                     } else {

                         echo '<script>

                             swal({
                                   title: "¡OK!",
                                   text: "¡Usuario registrado con exito! Verifica la carpeta de spam o de entrada de su correo electronico: ' . $_POST['emailReg'] . ' para verificar la cuenta",
                                   type:"success",
                                   confirmButtonText: "Cerrar",
                                   closeOnConfirm: false
                                 },

                                 function(isConfirm){

                                     if(isConfirm){
                                         history.back();
                                     }
                             });

                         </script>';

                     }*/
                }


            } else {

                echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡Caracteres invalidos en el correo!",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

            }
        }

    }

    public static function ctrShowUsers($item, $value)
    {
        $table = 'usuarios';

        $response = usersModel::sqlShowUsers($table, $item, $value);

        return $response;

    }

    public static function ctrUpdateUsers($id, $item, $value)
    {

        $table = 'usuarios';
        $response = usersModel::sqlSingleUpdateUsers($table, $id, $item, $value);
        return $response;

    }


    public function ctrLoginUsers()
    {

        if (isset($_POST['emailLogin'])) {
            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailLogin"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["logPass"])
            ) {


                $passwordCrypt = crypt($_POST['logPass'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $table = "usuarios";
                $item = "email";
                $value = $_POST["emailLogin"];

                $response = usersModel::sqlShowUsers($table, $item, $value);


                if (isset($response['email']) && ($response['email'] == $_POST["emailLogin"]) && $response['email'] && $passwordCrypt == $response['password']) {

                    if (isset($response['verificacion']) && $response['verificacion'] == 1) {


                        echo '<script> 

							swal({
								 title: "¡Error en login!",
								  text: "¡Ha ocurrido un problema!, no se ha vierificado el correo electronico , revisa tu bandeja de entrada o de spam con el correo registrado",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

                    } else {

                        $_SESSION["user"] = [

                            "status" => "ok",
                            "id" => $response["id"],
                            "nombre" => $response["nombre"],
                            "picture" => $response["foto"],
                            "email" => $response["email"],
                            "pass" => $response["password"],
                            "mode" => $response["modo"],

                        ];

                        echo '<script> window.location = localStorage.getItem("actualPath");</script>';

                    }

                } else {


                    echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "Verifique sus datos de ingreso",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
									    
										window.location = localStorage.getItem("actualPath");
									}
							});

						</script>';

                }


            } else {

                echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡Ha ocurrido un problema!, no se permiten caracteres especiales",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

            }

        }

    }

    public function ctrMissPass()
    {

        if (isset($_POST['passEmail'])) {

            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])) {

                function generatePass($length)
                {

                    $key = "";
                    $pattern = "1234567890abcdegfhijklmnopqrstuvwxyz";
                    $max = strlen($pattern) - 1;

                    for ($i = 0; $i < $length; $i++) {

                        $key .= $pattern{mt_rand(0, $max)};
                    }

                    return $key;

                }

                $newPass = generatePass(11);
                $passwordCrypt = crypt($newPass, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $table = "usuarios";
                $item1 = "email";
                $value1 = $_POST['passEmail'];

                $response1 = usersModel::sqlShowUsers($table, $item1, $value1);


                if ($response1) {

                    $table = "usuarios";
                    $id = $response1['id'];
                    $item = "password";
                    $value = $passwordCrypt;

                    $response = usersModel::sqlSingleUpdateUsers($table, $id, $item, $value);

                    if ($response == 'ok') {

                        echo '<script> 

							swal({
								  title: "¡OK!",
								  text: "Se ha generado una nueva contraseña",
								  type:"success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

                        /*Verify email*/

                        /* date_default_timezone_set("America/Monterrey");

                         $url = routing::selectRouteFrontEnd();


                         $mail = new PHPMailer;

                         $mail->CharSet = 'UTF-8';

                         $mail->isMail();

                         $mail->setFrom('cursos@tutorialesatualcance.com', 'Tutoriales a tu Alcance');

                         $mail->addReplyTo('cursos@tutorialesatualcance.com', 'Tutoriales a tu Alcance');

                         $mail->Subject = "Por favor verifique su dirección de correo electrónico";

                         $mail->addAddress($_POST["passEmail"]);

                         $mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

                                         <center>

                                             <img style="padding:20px; width:10%" src="http://tutorialesatualcance.com/tienda/logo.png">

                                         </center>

                                         <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">

                                             <center>

                                             <img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-pass.png">

                                             <h3 style="font-weight:100; color:#999">SOLICITUD DE NUEVA CONTRASEÑA</h3>

                                             <hr style="border:1px solid #ccc; width:80%">

                                             <h4 style="font-weight:100; color:#999; padding:0 20px"><strong>Su nueva contraseña: </strong>' . $newPass . '</h4>

                                             <a href="' . $url . '" target="_blank" style="text-decoration:none">

                                             <div style="line-height:60px; background:#0aa; width:60%; color:white">Ingrese nuevamente al sitio</div>

                                             </a>

                                             <br>

                                             <hr style="border:1px solid #ccc; width:80%">

                                             <h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

                                             </center>

                                         </div>

                                     </div>');

                         $send = $mail->Send();

                         if (!$send) {

                             echo '<script>

                             swal({
                                   title: "¡ERROR!",
                                   text: "¡Ha ocurrido un problema enviando contraseña de correo electrónico a ' . $_POST["passEmail"] . '  ' . $mail->ErrorInfo . '!",
                                   type:"error",
                                   confirmButtonText: "Cerrar",
                                   closeOnConfirm: false
                                 },

                                 function(isConfirm){

                                     if(isConfirm){
                                         history.back();
                                     }
                             });

                         </script>';

                         } else {

                             echo '<script>

                             swal({
                                   title: "¡OK!",
                                   text: "Una nueva contraseña se ha enviado a su correo electronico , verifique su carpeta de entrada o de spam",
                                   type:"success",
                                   confirmButtonText: "Cerrar",
                                   closeOnConfirm: false
                                 },

                                 function(isConfirm){

                                     if(isConfirm){
                                         history.back();
                                     }
                             });

                         </script>';

                         } */


                    } else {

                        echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡No se ha podido cambiar la contraseña!",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';


                    }


                } else {
                    echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡No se encuentra email registrado!",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';
                }


            } else {

                echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡Ha ocurrido un problema enviando el correo , caracteres no permitidos!",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

            }


        }

    }

    public static function ctrLoginSocialNetworks($data)
    {

        $table = "usuarios";
        $item = "email";
        $value = $data['email'];
        $duplicatedEmail = false;

        $response0 = usersModel::sqlShowUsers($table, $item, $value);
        $response1 = '';

        if ($response0) {

            $duplicatedEmail = true;

            if ($response0["modo"] != $data['mode']) {

                echo '<script>
                            swal({
                            title: "¡Error en registro!",
                            text: "Este email ' . $data['email'] . ' ya esta registrado con otro metodo de ingreso",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }, function(isConfirm){
                        
                                history.back();
                        
                        });

                       </script>';

                $duplicatedEmail = false;
            }

        } else {

            $response1 = usersModel::sqlRegisterUser($table, $data);


        }


        if ($duplicatedEmail || $response1 == 'ok') {

            $item = "email";
            $value = $data["email"];

            $response2 = usersModel::sqlShowUsers($table, $item, $value);

            if ($response2["modo"] == "facebook") {

                session_start();

                $_SESSION["user"] = [

                    "status" => "ok",
                    "id" => $response2["id"],
                    "nombre" => $response2["nombre"],
                    "picture" => $response2["foto"],
                    "email" => $response2["email"],
                    "pass" => $response2["password"],
                    "mode" => $response2["modo"],

                ];

                echo 'ok';

            } else if ($response2["modo"] == "google") {

                $_SESSION["user"] = [

                    "status" => "ok",
                    "id" => $response2["id"],
                    "nombre" => $response2["nombre"],
                    "picture" => $response2["foto"],
                    "email" => $response2["email"],
                    "pass" => $response2["password"],
                    "mode" => $response2["modo"],

                ];

            } else {

                echo '';
            }

        }


    }

    public static function ctrUpdateUserData($data)
    {

        $table = 'usuarios';
        $response = usersModel::sqlUpdateUserData($table, $data);
        return $response;

    }

    public static function ctrShowPuerchases($item, $value){
        $table = 'compras';
        $response = usersModel::sqlShowPurchases($table, $item, $value);
        return $response;
    }


    public static function ctrShowComments($data){
        $table = 'comentarios';
        $response = usersModel::sqlShowComments($table, $data);
        return $response;
    }



}