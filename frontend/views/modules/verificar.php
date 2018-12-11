<!--=====================================
VERIFICAR
======================================-->

<?php

$paths = explode('/', $_GET['path']);

$usuarioVerificado = false;

$item = "emailEncriptado";
$value = $paths[1];


$response = usersController::ctrShowUsers($item, $value);

if ($value == $response["emailEncriptado"]) {

    $id = $response["id"];
    $item2 = "verificacion";
    $valor2 = 0;

    $response2 = usersController::ctrUpdateUsers($id, $item2, $valor2);

    if (($response2) && $response2 !== null) {
        $usuarioVerificado = true;
    }

}


?>

<div class="container">

    <div class="row">

        <div class="col-xs-12 text-center verificar">

            <?php

            if($usuarioVerificado){

                echo '<h3>Gracias</h3>
						<h2><small>¡Hemos verificado su correo electrónico, ya puede ingresar al sistema!</small></h2>

						<br>

						<a href="#modalIngreso" data-toggle="modal"><button class="btn btn-default backColor btn-lg">INGRESAR</button></a>';


            }else{

                echo '<h3>Error</h3>

					<h2><small>¡No se ha podido verificar el correo electrónico,  vuelva a registrarse!</small></h2>

					<br>

					<a href="#modalRegistro" data-toggle="modal"><button class="btn btn-default backColor btn-lg">REGISTRO</button></a>';


            }

            ?>

        </div>

</div>

