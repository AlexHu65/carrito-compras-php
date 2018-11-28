<?php

// Get dynamic data from products according path and value
$item = "ruta";
$value = $paths[0];
$infoProduct = productsController::ctrProductInfo($item, $value);


//Get sub category
$itemSub = 'id';
$valueSub = $infoProduct['id_subcategoria'];
$subcategoriesPath = productsController::ctrSubCategories($itemSub, $valueSub);

//Similar products

$order = 'RAND()';
$item = 'id_subcategoria';
$value = $infoProduct['id_subcategoria'];
$base = 0;
$top = 4;
$mode = 'ASC';

$similarProducts = productsController::ctrProducts($order, $item, $value, $base, $top, $mode);

//Get multimedia string

$multimedia = json_decode($infoProduct['multimedia'], true);

//Count views product

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

<!-- end breadcrumbs -->

<div class="container-fluid infoproducto">
    <div class="container">
        <!-- Info products -->
        <div class="row">


            <!-- thumbnail  -->
            <?php

            if (isset($infoProduct['tipo']) && $infoProduct['tipo'] == 'fisico') {

                //if product type is physical product

                include 'details/thumbnails.php';

            } else {
                //if product type is NOT physical product

                include 'details/video.php';
            }

            ?>
            <!-- end thumbnails or video -->

            <?php

            if (isset($infoProduct['tipo']) && $infoProduct['tipo'] == 'fisico') {

                echo '<div id="product-details" class="col-md-7 col-sm-6 col-xs-12">';

            } else {

                echo '<div id="product-details" class="col-sm-6 col-xs-12">';

            } ?>


            <div class="col-xs-6 pull-left">
                <h6>
                    <a class="text-muted pull-left" href="javascript:history.back()">
                        <i class="fa fa-shopping-cart"></i> Seguir comprando
                    </a>
                </h6>
            </div>
            <div class="col-xs-6 pull-right">
                <h6>

                    <a class="dropdown-toggle text-muted pull-right" data-toggle="dropdown" href="#">
                        <i class="fa fa-share"></i> Compartir
                    </a>
                    <ul class="dropdown-menu pull-right compartirRedes">

                        <!-- social media facebook -->
                        <li>
                            <p class="btnFacebook">
                                <i class="fa fa-facebook"></i> Facebook
                            </p>
                        </li>
                        <!-- social media google -->
                        <li>
                            <p class="btnGoogle">
                                <i class="fa fa-google"></i> Google
                            </p>
                        </li>

                    </ul>
                </h6>
            </div>
            <div class="clearfix"></div>


            <!-- product details-->

            <h1 class="text-muted text-uppercase">
                <?php

                //Title product
                echo $infoProduct['titulo'];
                //echo $infoProduct['id'];
                echo '<hr>';

                //Offer product
                if (isset($infoProduct['oferta']) && $infoProduct['oferta'] == 1) {

                    echo '<small>';
                    echo '<span class="label label-warning">' . $infoProduct['descuentoOferta'] . '% OFF</span>';
                    echo '</small>';
                }

                //New product
                if (isset($infoProduct['oferta']) && $infoProduct['nuevo'] == 1) {

                    echo ' <small>';
                    echo '<span class="label label-warning" > NUEVO</span >';
                    echo '</small >';

                } ?>
            </h1>

            <?php
            if (isset($infoProduct['precio']) && $infoProduct['precio'] == 0) {

                echo '<h3 class="text-muted"><b class="label label-success">GRATIS</b></h3><br>';

            } else {

                if (isset($infoProduct['precio']) && $infoProduct['oferta'] == 0) {

                    echo '<h3 class="text-muted"><b class="text-muted">USD</b> $' . $infoProduct['precio'] . '</h3>';

                } else {

                    echo '<h3 class="text-muted">';
                    echo '<span>';
                    echo '<strong class="oferta"><b class="text-muted">USD</b> $' . $infoProduct['precio'] . '</strong>';
                    echo '</span>';

                    echo '<span>';
                    echo '<strong><b class="text-muted" >USD</b> $' . $infoProduct['precioOferta'] . '</strong>';
                    echo '</span>';
                    echo '</h3>';
                }
            }

            //description

            echo '<p>' . $infoProduct['descripcion'] . '</p>' ?>

            <hr>

            <div class="form-group row">

                <?php if (!empty($infoProduct['detalles']) != null) {

                    $details = json_decode($infoProduct['detalles'], true);
                    include 'details/details.php';
                }
                ?>
            </div>
            <!-- delivery  -->

            <?php

            echo '<h4>';
            echo '<hr>';
            echo '<span class="label label-default" style="font-weight: 100">';
            echo '<i class="fa fa-clock-o"></i>';
            echo ($infoProduct['entrega'] == 0) ? '  Entrega inmediata' : ' ' . $infoProduct['entrega'] . ' d&iacute;as para entrega';
            echo '</span>';
            echo '<span class="label label-default" style="font-weight: 100; margin-left: 15px;">';
            echo '<i class="fa fa-shopping-cart"></i> ' . $infoProduct['ventas'] . '</span>';
            echo '<span class="label label-default" style="font-weight: 100; margin-left: 15px;">';
            if (isset($infoProduct['precio']) && $infoProduct['precio'] == 0) {

                echo '<i class="fa fa-eye"></i> <span class="views" product-id="' . $infoProduct['id'] . '" price="free"> ' . $infoProduct['vistasGratis'] . '</span></span>';

            } else {
                echo '<i class="fa fa-eye"></i> <span class="views" product-id="' . $infoProduct['id'] . '" price="normal"> ' . $infoProduct['vistas'] . '</span></span>';

            }
            echo '</h4>';

            ?>
            <hr>

            <!-- buttons shop -->
            <div class="row">

                <?php if ($infoProduct['precio'] == 0) {

                    if ($infoProduct['tipo'] == 'virtual') {
                        echo '<div class="col-md-6 col-xs-12">
                    <button class="btn btn-default btn-block btn-lg">Acceder ahora</button>
                    
                </div>';
                    } else {

                        echo '<div class="col-md-6 col-xs-12">
                    <button class="btn btn-default btn-block btn-lg"><i class="fa fa-shopping-cart"></i>
                    Solicitar ahora</button>                   

                    
                </div>';

                    }

                } else {

                    if ($infoProduct['tipo'] == 'virtual') {

                        echo '<div class="col-md-6 col-xs-12">
                    <button class="btn btn-default btn-block btn-lg">Comprar ahora</button>
                </div>
                
                <div class="col-md-6">
                    <button class="btn btn-default btn-block btn-lg"><i class="fa fa-shopping-cart"></i>
                        Agregar al carrito
                    </button>
                </div>';
                    } else {

                        echo '<div class="col-md-6 col-xs-12">
                    <button class="btn btn-default btn-block btn-lg"><i class="fa fa-shopping-cart"></i>
                        Agregar al carrito
                    </button>
                </div>';
                    }


                } ?>


            </div>
            <!-- lens -->
            <figure class="lupa">
                <img src="" alt="">
            </figure>

        </div>

    </div>
    <!--comments -->
    <br>
    <br>
    <div class="row">
        <ul class="nav nav-tabs">
            <li class="active"><a href="">Comentarios</a></li>
            <li><a href="">Ver M&aacute;s</a></li>
            <li class="pull-right"><a href="#" class="text-muted">Promedio de calificaci&oacute;n : 3.5
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star-half-o text-success"></i>
                    <i class="fa fa-star-o text-success"></i>
                </a>
            </li>
        </ul>
        <br>
        <div class="row comments">

            <div class="panel-group col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-uppercase">
                        <span class="text-right"><img class="img-circle"
                                                      src="<?= $config['frontend'] . 'views/img/users/40/944.jpg' ?>"
                                                      width="20%" alt="profile-picture"></span>
                        <b class="text-muted">Manuel Alejandro</b>
                    </div>
                    <div class="panel-body">
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto eligendi facilis,
                            magni nihil omnis quisquam quod rerum totam! Autem fuga hic nesciunt nulla odio odit
                            officiis quidem rem suscipit veniam?
                        </small>
                    </div>
                    <div class="panel-footer">
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star-half-o text-success"></i>
                        <i class="fa fa-star-o text-success"></i>
                    </div>
                </div>

            </div>
            <div class="panel-group col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-uppercase">
                        <span class="text-right"><img class="img-circle"
                                                      src="<?= $config['frontend'] . 'views/img/users/40/944.jpg' ?>"
                                                      width="20%" alt="profile-picture"></span>
                        <b class="text-muted">Manuel Alejandro</b>
                    </div>
                    <div class="panel-body">
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto eligendi facilis,
                            magni nihil omnis quisquam quod rerum totam! Autem fuga hic nesciunt nulla odio odit
                            officiis quidem rem suscipit veniam?
                        </small>
                    </div>
                    <div class="panel-footer">
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star-half-o text-success"></i>
                        <i class="fa fa-star-o text-success"></i>
                    </div>
                </div>

            </div>
            <div class="panel-group col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-uppercase">
                        <span class="text-right"><img class="img-circle"
                                                      src="<?= $config['frontend'] . 'views/img/users/40/944.jpg' ?>"
                                                      width="20%" alt="profile-picture"></span>
                        <b class="text-muted">Manuel Alejandro</b>
                    </div>
                    <div class="panel-body">
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto eligendi facilis,
                            magni nihil omnis quisquam quod rerum totam! Autem fuga hic nesciunt nulla odio odit
                            officiis quidem rem suscipit veniam?
                        </small>
                    </div>
                    <div class="panel-footer">
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star-half-o text-success"></i>
                        <i class="fa fa-star-o text-success"></i>
                    </div>
                </div>

            </div>
            <div class="panel-group col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-uppercase">
                        <span class="text-right"><img class="img-circle"
                                                      src="<?= $config['frontend'] . 'views/img/users/40/944.jpg' ?>"
                                                      width="20%" alt="profile-picture"></span>
                        <b class="text-muted">Manuel Alejandro</b>
                    </div>
                    <div class="panel-body">
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto eligendi facilis,
                            magni nihil omnis quisquam quod rerum totam! Autem fuga hic nesciunt nulla odio odit
                            officiis quidem rem suscipit veniam?
                        </small>
                    </div>
                    <div class="panel-footer">
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star-half-o text-success"></i>
                        <i class="fa fa-star-o text-success"></i>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- end comments -->
    <div class="row">
        <hr style="border: 0;">

        <!-- similar products -->
        <div id="similar-products">
            <div class="row">
                <div class="col-xs-12 tituloDestacado">
                    <!----Title module----->
                    <div class="col-sm-6 col-xs-12">
                        <h1>
                            <small>Te podr&iacute;a interesar</small>
                        </h1>
                    </div>
                    <!----End title module----->

                    <!-- Buttons group -->
                    <div class="col-sm-6 col-xs-12">
                        <a href="<?= $config['frontend'] . $subcategoriesPath[0]['ruta'] ?>">
                            <button class="btn btn-default pull-right" data-toggle="tooltip"
                                    title="Ver m&aacute;s">
                                <span class="fa fa-search-plus"></span>
                            </button>
                        </a>
                    </div>
                    <!--End buttons group -->
                    <div class="clearfix"></div>
                    <hr>
                </div>
                <!-- titulo destacado-->
            </div>
            <?php

            if (empty($similarProducts) || !($similarProducts)) {
                echo '<div class="col-xs-12 error404">';

                echo '<h1><small>Oops! </small></h1> ';
                echo '<h2>No hay productos relacionados</h2> ';

                echo '</div>';
            } else {

                include 'similar.php';

            }


            ?>

        </div>

    </div>

</div>