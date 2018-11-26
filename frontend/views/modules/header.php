<!-- Top header -->
<div class="container-fluid barraSuperior" id="top">

    <div class="container-fluid">
        <div class="row">

            <!-- Social network icons -->
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">
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
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro">
                <ul>
                    <li>

                        <button id="searchButton" class="btn btn-default" data-toggle="modal"
                        data-target="#searchModal">
                        <i class="fa fa-search"></i>
                        </button>
                    </li>
                    <li>|</li>
                    <li><a href="#modalIngreso" data-toggle="modal">Ingresar</a></li>
                    <li>|</li>
                    <li><a href="#modalRegistro" data-toggle="modal">Crear cuenta</a></li>
                    <li>|</li>
                    <li>
                        <div class="pull-right" id="carrito">
                            <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                            <span class="sumaCesta">USD $50.00 </span>
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

        <div class="row" id="header">

            <!-- Logo -->
            <div class="col-lg-2 col-md-3 col-sm-2 col-xs-12" id="logotipo">
                <a href="<?= $config['frontend'] ?>">
                    <img src="<?= $config['backend'] ?>views/img/template/<?= $config['ctrTemplate']["logo"] ?>"
                         alt="logo" class="img-responsive">
                </a>

            </div>

            <!--Browser and categories -->
            <div class="col-xs-12">

                <!-- categories button -->
                <div class="col-xs-12" id="btnCategorias">

                    <p>
                        CATEGORIAS
                        <span class="pull-right">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </span>
                    </p>
                </div>
            </div>

        </div>

        <!--Categories -->
        <div class="col-xs-12" id="categorias">
            <?php

            for ($i = 0; $i < count($config['categories']); $i++) {

                echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12"><h4> <a href="' . $config['frontend'] . $config['categories'][$i]['ruta'] . '" class="pixelCategorias"> ' . $config['categories'][$i]['categoria'] . '</a><hr class="limiter"><ul>';

                $value = $config['categories'][$i]['id'];
                $item = 'id_categoria';

                $subCategories = productsController::ctrSubCategories($item, $value);
                foreach ($subCategories as $key => $value) {
                    echo '<li><a href="' . $config['frontend'] . $value['ruta'] . '" class="pixelSubCategorias">' . $value['subcategoria'] . '</a></li>';

                }
                echo '</ul></div>';
            } ?>
        </div>


    </div>

</header>
