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

                $encriptarEmail = md5($_POST['regEmail']);


                $data = [
                    'name' => $_POST['regUser'],
                    'password' => $passwordCrypt,
                    'email' => $_POST['emailReg'],
                    'mode' => 'direct',
                    'verify' => 1,
                    'emailcrypt' => $encriptarEmail
                ];

                $table = 'usuarios';
                $response = usersModel::sqlRegisterUser($table, $data);

                if (($response) && ($response !== null)) {

                    /*Verify email*/
                    date_default_timezone_set("America/Monterrey");

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
								  text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a ' . $_POST["emailReg"] .'  '. $mail->ErrorInfo . '!",
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

                    }
                }


            } else {

                echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡Ha ocurrido un problema!",
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

    public static function ctrShowUsers($item , $value){

        $table = 'usuarios';

        $response = usersModel::sqlShowUsers($table, $item, $value);

        return $response;

    }

    public static function ctrUpdateUsers($id , $item , $value){

        $table = 'usuarios';

        $response = usersModel::sqlMailUpdateUsers($table, $id, $item, $value);

        return $response;

    }

}