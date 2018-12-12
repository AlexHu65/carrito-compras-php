<!-- Top header -->
<div class="container-fluid barraSuperior" id="top">
    <div class="container-fluid">
        <div class="row">
            <!-- Social network icons -->
            <div class="col-sm-3 social">
                <ul>
                    <?php
                    $socialnetwork = json_decode($config['ctrTemplate']['redesSociales'], true);
                    foreach ($socialnetwork as $key => $social) {
                        echo '<li><a href="' . $social['url'] . '"><i class="fa ' . $social['red'] . ' redSocial ' . $social['estilo'] . ' "aria-hidden="true"></i></a></li>';
                    }
                    ?>
                </ul>
            </div>
            <!-- Login/Register -->
            <div class="col-sm-9 registro">
                <ul>
                    <li>
                        <button id="searchButton" class="btn btn-default" data-toggle="modal"
                                data-target="#searchModal">
                            <i class="fa fa-search"></i>
                        </button>
                    </li>

                    <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["status"] == "ok") {

                        //  print_r($_SESSION["user"]);

                        if ($_SESSION["user"]["mode"] == "direct") {

                            if ($_SESSION["user"]["picture"] != "") {

                                echo '<li> <img class="img-circle" src="' . $config['frontend'] . "views/img/users/" . $_SESSION['user']['id'] . "/" . $_SESSION['user']['picture'] . '" alt=""> </li>';

                            } else {

                                echo '<li><img style="width: 2%;" class="img-circle" src="' . $config['backend'] . 'views/img/usuarios/default/anonymous.png" alt=""></li>';

                            }

                            echo '<li><a href="' . $config['frontend'] . 'perfil">Perfil</a></li>';
                            echo '<li><a href="' . $config['frontend'] . 'logout">Cerrar sesion</a></li>';

                        } else if ($_SESSION["user"]["mode"] == "facebook") {

                            echo '<li> <img style="width: 2%;" class="img-circle" src="' . $_SESSION['user']['picture'] . '" alt=""> </li>';
                            echo '<li><a href="' . $config['frontend'] . 'perfil">Perfil</a></li>';
                            echo '<li><a class="logout" href="' . $config['frontend'] . 'logout">Cerrar sesion</a></li>';


                        }

                        ?>


                    <?php } else { ?>

                        <li><a href="#modalIngreso" data-toggle="modal">Ingresar</a></li>

                        <li><a href="#modalRegistro" data-toggle="modal">Crear cuenta</a></li>

                    <?php } ?>


                    <li>
                        <div style="font-size: larger;" class="pull-right" id="carrito">
                            <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                            <span style="font-family: 'Montserrat', sans-serif;" class="sumaCesta">USD $50.00 </span>
                            <span class="cantidadCesta">1</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--header -->
<header class="container-fluid">

    <div class="container">
        <div class="row" id="head">
            <div style="margin-top: 25px;" id="logo" class="col-sm-2">
                <a href="<?= $config['frontend'] ?>">
                    <img src="<?= $config['backend'] ?>views/img/template/<?= $config['ctrTemplate']["logo"] ?>"
                         alt="logo" class="img-responsive">
                </a>
            </div>
            <div class="col-sm-10">
                <div class="col-sm-12" id="btnCategorias">

                    <p style="font-family: 'Montserrat', sans-serif; font-weight: 700;">
                        CATEGORIAS<span class="pull-right"><i class="fa fa-bars" aria-hidden="true"></i></span>
                    </p>

                </div>
                <div class="col-sm-12">
                    <div class="col-sm-12" id="categorias">

                        <?php

                        for ($i = 0; $i < count($config['categories']); $i++) {

                            echo '<div class="col-sm-4 col-md-2"><h4><a style="font-family: \'Montserrat\', sans-serif; font-weight: 500; font-size: small;" href="' . $config['frontend'] . $config['categories'][$i]['ruta'] . '" class="pixelCategorias"> ' . $config['categories'][$i]['categoria'] . '</a></h4><hr class="limiter"><ul>';

                            $value = $config['categories'][$i]['id'];
                            $item = 'id_categoria';

                            $subCategories = productsController::ctrSubCategories($item, $value);

                            foreach ($subCategories as $key => $value) {
                                echo '<li><a style="font-family: \'Montserrat\', sans-serif; font-size: small;" href="' . $config['frontend'] . $value['ruta'] . '" class="pixelSubCategorias">' . $value['subcategoria'] . '</a></li>';

                            }
                            echo '</ul></div>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>

        <div id="btnSlide"><i class="fa fa-angle-up"></i></div>

    </center>
</header>
