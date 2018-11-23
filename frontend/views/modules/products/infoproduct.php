<?php

// Get dynamic data from products according path and value
$item = "ruta";
$value = $paths[0];
$infoProduct = productsController::ctrProductInfo($item, $value);

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


            <div class="clearfix"></div>

            <!-- product details-->

            <h1 class="text-muted text-uppercase">

                <?php

                //Title product
                echo $infoProduct['titulo'];
                echo ' <hr>';

                //Offer product
                if (isset($infoProduct['oferta']) && $infoProduct['oferta'] == 1) { ?>

                    <small>
                        <span class="label label-warning"><?= $infoProduct['descuentoOferta'] ?>% OFF</span>
                    </small>

                <?php }

                //New product
                if (isset($infoProduct['oferta']) && $infoProduct['nuevo'] == 1) { ?>

                    <small>
                        <span class="label label-warning">NUEVO</span>
                    </small>

                <?php } ?>


            </h1>

            <?php
            if (isset($infoProduct['precio']) && $infoProduct['precio'] == 0) {

                echo '<h3 class="text-muted"><b class="label label-success">GRATIS</b></h3><br>';

            } else {

                if (isset($infoProduct['precio']) && $infoProduct['oferta'] == 0) {

                    echo '<h3 class="text-muted"><b class="text-muted" style="color: #00b5cc;">USD</b> $' . $infoProduct['precio'] . '</h3>';

                } else {

                    echo '<h3 class="text-muted">
                             <span>
                                  <strong class="oferta"><b class="text-muted">USD</b> $' . $infoProduct['precio'] . '</strong>
                             </span>
                             
                              <span>
                                  <strong><b class="text-muted" style="color: #00b5cc;">USD</b> $' . $infoProduct['precioOferta'] . '</strong>
                             </span>
                          </h3>';
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
            echo '<h4>
                           <hr>
                               <span class="label label-primary" style="font-weight: 100">
                               <i class="fa fa-clock-o"></i>';
            echo ($infoProduct['entrega'] == 0) ? '  Entrega inmediata' : ' ' . $infoProduct['entrega'] . ' d&iacute;as para entrega';
            echo '</span>                             
                             <span class="label label-primary" style="font-weight: 100; margin-left: 15px;">
                               <i class="fa fa-shopping-cart"></i> ' . $infoProduct['ventas'] . '
                                                            </span> 
                             <span class="label label-primary" style="font-weight: 100; margin-left: 15px;">
                               <i class="fa fa-eye"></i> ' . $infoProduct['vistas'] . '
                                                            </span>
                            </h4>';
            ?>

            <hr>

            <div class="col-xs-6 pull-left">
                <h6>
                    <a class="text-muted" href="javascript:history.back()">
                        <i class="fa fa-shopping-cart"></i> Seguir comprando
                    </a>
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

            <!-- shop -->

            <div class="row text-center">


            </div>

            <!-- lens -->
            <figure class="lupa">

                <img src="" alt="">
            </figure>
        </div>
    </div>
</div>
</div>

</div>