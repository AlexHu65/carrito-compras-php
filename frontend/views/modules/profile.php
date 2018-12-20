<?php




if (!isset($_SESSION['user'])) {

    echo '<script>

        window.location = "' . $config['frontend'] . '";

</script>';

    exit();
}


?>
<!-- breadcrumbs -->
<div class="container-fluid productos">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb fondoBreadCrumb">
                <li>
                    <a href="<?= $config['frontend'] ?>">Home</a>
                </li>
                <li class="active paginaActiva">
                    <?= $paths[0]; ?>
                </li>
            </ul>
            <!-- share social networks -->
            <hr>
        </div>

    </div>
</div>

<!--PANEL -->

<div class="container-fluid">
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#compras"><i class="fa fa-list-ul"></i> Mis compras</a></li>
            <li><a data-toggle="tab" href="#deseos"><i class="fa fa-gift"></i> Lista de deseos</a></li>
            <li><a id="profile-info" data-toggle="tab" href="#profile"><i class="fa fa-user"></i> Perfil</a></li>
            <li><a href="<?= $config['frontend']; ?>ofertas/"><i class="fa fa-star"></i> Ver ofertas</a></li>
        </ul>

        <div class="tab-content">

            <!-- #COMPRAS -->
            <div id="compras" class="tab-pane fade in active">

                <?php include 'profile/puerchases.php'?>

            </div>
            <!-- #DESEOS -->
            <div id="deseos" class="tab-pane fade">


            </div>

            <!-- #EDITAR -->
            <div id="profile" class="tab-pane fade">

                <div class="row">
                    <form id="updateUser-form" method="post" enctype="multipart/form-data">
                        <div class="col-md-3 col-sm-4 col-xs-12 text-center">
                            <br>
                            <figure id="img-profile-picture">


                                <?php


                                if ($_SESSION['user']['mode'] !== 'direct') {

                                    echo '<img class="img-thumbnail" src="' . $_SESSION['user']['picture'] . '">';

                                } else {

                                    if ($_SESSION['user']['picture'] == '') {


                                        echo '<img id="profile-img" class="img-thumbnail" src="' . $config['backend'] . 'views/img/usuarios/default/anonymous.png">';

                                    } else {

                                        echo '<img id="profile-img" class="img-thumbnail" src="' . $config['frontend'] . "views/img/users/" . $_SESSION['user']['id'] . "/" . $_SESSION['user']['picture'] . '" alt="">';

                                    }
                                }

                                ?>

                                <?php if ($_SESSION['user']['mode'] == 'direct') { ?>

                                <div class="middle">
                                    <div id="upload-button"><i class="fa fa-upload"></i>
                                        <input size="60" id="img-user-data" value="Seleccionar archivo"
                                               name="img-user-data"
                                               type="file" class="form-control">

                                    </div>
                                </div>


                            </figure>
                            <center>
                                <div style="font-size: small; width: 50%" class="text-muted text-center">
                                    <i class="fa fa-info"></i> Pulsa sobre tu foto de perfil para actualizar.
                                </div>
                            </center>

                            <?php } else { ?>


                                </figure>

                            <?php } ?>


                            <?php

                            if ($_SESSION['user']['mode'] == "direct") {
                                echo '<button type="button" class="btn btn-success" id="update-img"> Cambiar foto</button>';
                            }

                            ?>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12">
                            <?php

                            if ($_SESSION['user']['mode'] == 'direct') {

                                include 'profile/email.php';

                            } else {
                                include 'profile/social.php';

                            }

                            ?>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

