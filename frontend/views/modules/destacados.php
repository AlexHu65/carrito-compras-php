<?php

//$products = productsController::ctrProducts('vistas');
include 'products/banner.php';

$order = null;
$item = null;
$value = null;

$freeProducts = '';
$selledProducts = '';
$viewProducts = '';

$base = 0;
$top = 4;


/*Modules settings */

$modules = [
    0 => [
        'title' => 'ARTICULOS GRATUITOS',
        'id' => 'free',
        'path' => 'articulos-gratis'
    ],

    1 => [
        'title' => 'LO MAS VENDIDO',
        'id' => 'sell',
        'path' => 'lo-mas-vendido'
    ],
    2 => [
        'title' => 'LO MAS VISTO',
        'id' => 'views',
        'path' => 'lo-mas-visto'
    ],

];

/**
 * Free module - all free products
 */

if ($modules[0]['id'] == 'free') {

    $order = "id";
    $item = "precio";
    $value = 0;
    $mode = 'DESC';
    $freeProducts = productsController::ctrProducts($order, $item, $value, $base, $top, $mode);

}

/**
 * Most Selled products - all most selled products
 */


if ($modules[1]['id'] == 'sell') {

    $order = "ventas";
    $item = null;
    $value = null;
    $mode = 'DESC';
    $selledProducts = productsController::ctrProducts($order, $item, $value, $base, $top, $mode);

}

/**
 * Most viewed products - all most selled products
 */



if ($modules[2]['id'] == 'views') {

    $order = "vistas";
    $item = null;
    $value = null;
    $mode = 'DESC';
    $viewProducts = productsController::ctrProducts($order, $item, $value, $base, $top, $mode);

}

//All modules items
$modulesInfo = [$freeProducts, $selledProducts, $viewProducts];

?>

    <div class="col-xs-12 col-sm-12">
        <div class="row">
            <?php
            for ($i = 0; $i < count($modules); $i++) { ?>
                <hr style="border: 0;">
                <div class="container-fluid productos">
                    <div class="container">
                        <div class="row">
                            <!-- Title -->
                            <div class="col-xs-12 tituloDestacado"><!----Titulo destacado----->
                                <div class="col-sm-6 col-xs-12">
                                    <h1>
                                        <small><?= $modules[$i]['title']; ?></small>
                                    </h1>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="fc-button-group"></div>
                                    <a href="<?= $modules[$i]['path']; ?>">
                                        <button class="btn btn-default pull-right" data-toggle="tooltip"
                                                title="Ver m&aacute;s">
                                            <span class="fa fa-search-plus"></span>
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-default btnGrid pull-right"
                                            id="btnGrid<?= $i ?>" data-toggle="tooltip"
                                            title="Ver en cuadr&iacute;cula">
                                        <i class="fa fa-th" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btnList pull-right"
                                            id="btnList<?= $i ?>" data-toggle="tooltip"
                                            title="Ver en lista">
                                        <i class="fa fa-list " aria-hidden="true"></i>
                                    </button>

                                </div>
                                <div class="clearfix"></div>
                                <hr>

                            </div><!-- . titulo destacado-->
                        </div>
                        <div>
                            <!-- Show products grid-->
                            <ul class="grid<?= $i; ?>">
                                <?php

                                foreach ($modulesInfo[$i] as $key => $value) { ?>

                                    <li class="col-md-3 col-sm-6 col-xs-12">

                                        <figure>

                                            <a href="<?= $value["ruta"]; ?>" class="pixelProducto">

                                                <?php
                                                //Todo: Remove this variable , it is only for tests on local side
                                                $imgValue = 'views' . substr($value['portada'], strlen('vistas'));
                                                ?>
                                                <img src="<?= $config['backend'] . $imgValue; ?>"
                                                     class="img-responsive">

                                            </a>

                                        </figure>
                                        <h4>
                                            <small>
                                                <a href="<?= $value["ruta"]; ?>" class="pixelProducto">

                                                    <?= $value["titulo"]; ?><br>
                                                    <span style="color:rgba(0,0,0,0)">-</span>

                                                    <?php

                                                    if ($value["nuevo"] != 0) {

                                                        echo '<span class="label label-warning fontSize">Nuevo</span> ';

                                                    }

                                                    if ($value["oferta"] != 0) {

                                                        echo '<span class="label label-warning fontSize">' . $value["descuentoOferta"] . '% off</span>';

                                                    }

                                                    echo '</a>';

                                                    ?>


                                                </a>

                                            </small>

                                        </h4>

                                        <div class="col-xs-6 precio">
                                            <?php

                                            if ($value["precio"] == 0) {

                                                echo '<h2><small>GRATIS</small></h2>';

                                            } else {

                                                if ($value["oferta"] != 0) {

                                                    echo '<h2>

											<small>
						
												<strong class="oferta">USD $' . $value["precio"] . '</strong>

											</small>

											<small>$' . $value["precioOferta"] . '</small>
										
										</h2>';

                                                } else {

                                                    echo '<h2><small>USD $' . $value["precio"] . '</small></h2>';

                                                }

                                            }

                                            ?>
                                        </div>
                                        <div class="col-xs-6 enlaces">

                                            <div class="btn-group pull-right">

                                                <button type="button" class="btn btn-default btn-xs deseos"
                                                        idProducto="<?= $value["id"]; ?>" data-toggle="tooltip"
                                                        title="Agregar a mi lista de deseos">

                                                    <i class="fa fa-heart" aria-hidden="true"></i>

                                                </button>

                                                <a href="<?= $value["ruta"]; ?>" class="pixelProducto">

                                                    <button type="button" class="btn btn-default btn-xs"
                                                            data-toggle="tooltip"
                                                            title="Ver producto">

                                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                                    </button>

                                                </a>

                                                <?php

                                                if ($value["tipo"] == "virtual" && $value["precio"] != 0) {

                                                    if ($value["oferta"] != 0) {

                                                        echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="' . $value["id"] . '" imagen="' . $config['backend'] . $imgValue . '" titulo="' . $value["titulo"] . '" precio="' . $value["precioOferta"] . '" tipo="' . $value["tipo"] . '" peso="' . $value["peso"] . '" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true"></i>

											</button>';

                                                    } else {

                                                        echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="' . $value["id"] . '" imagen="' . $config['backend'] . $imgValue . '" titulo="' . $value["titulo"] . '" precio="' . $value["precio"] . '" tipo="' . $value["tipo"] . '" peso="' . $value["peso"] . '" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true"></i>

											</button>';

                                                    }


                                                }

                                                ?>

                                            </div>

                                        </div>


                                    </li>

                                <?php } ?>
                            </ul>
                            <!-- Show products list-->

                            <ul class="list<?= $i; ?>" style="display:none">

                                <?php foreach ($modulesInfo[$i] as $key => $value) { ?>

                                    <li class="col-xs-12">
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                            <figure>

                                                <a href="<?= $value["ruta"] ?>'" class="pixelProducto">
                                                    <?php
                                                    //Todo: Remove this variable , it is only for tests on local side
                                                    $imgValue = 'views' . substr($value['portada'], strlen('vistas'));
                                                    ?>

                                                    <img src="<?= $config['backend'] . $imgValue; ?>"
                                                         class="img-responsive">

                                                </a>

                                            </figure>
                                        </div>
                                        <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">
                                            <h1>

                                                <small>

                                                    <a href="<?= $value["ruta"]; ?>" class="pixelProducto">

                                                        <a href="<?= $value["ruta"]; ?>" class="pixelProducto">

                                                            <?= $value["titulo"]; ?><br>

                                                            <?php if ($value["nuevo"] != 0) {

                                                                echo '<span class="label label-warning">Nuevo</span> ';

                                                            }

                                                            if ($value["oferta"] != 0) {

                                                                echo '<span class="label label-warning">' . $value["descuentoOferta"] . '% off</span>';

                                                            }

                                                            echo '</a>'; ?>

                                                </small>

                                            </h1>
                                            <p class="text-muted"><?= $value["titular"]; ?></p>

                                            <?php if ($value["precio"] == 0) {

                                                echo '<h2><small>GRATIS</small></h2>';

                                            } else {

                                                if ($value["oferta"] != 0) {

                                                    echo '<h2>

                                    <small>

                                        <strong class="oferta">USD $' . $value["precio"] . '</strong>

                                    </small>

                                    <small>$' . $value["precioOferta"] . '</small>

                                </h2>';

                                                } else {

                                                    echo '<h2><small>USD $' . $value["precio"] . '</small></h2>';

                                                }

                                            } ?>

                                            <div class="btn-group pull-left enlaces">

                                                <button type="button" class="btn btn-default btn-xs deseos"
                                                        idProducto="<?= $value["id"] ?>" data-toggle="tooltip"
                                                        title="Agregar a mi lista de deseos">

                                                    <i class="fa fa-heart" aria-hidden="true"></i>
kk
                                                </button>

                                                <a href="<?= $value["ruta"]; ?>" class="pixelProducto">

                                                    <button type="button" class="btn btn-default btn-xs"
                                                            data-toggle="tooltip"
                                                            title="Ver producto">

                                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                                    </button>

                                                </a>

                                                <?php

                                                if ($value["tipo"] == "virtual" && $value["precio"] != 0) {

                                                    if ($value["oferta"] != 0) {

                                                        echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="' . $value["id"] . '" imagen="' . $config['backend'] . $imgValue . '" titulo="' . $value["titulo"] . '" precio="' . $value["precioOferta"] . '" tipo="' . $value["tipo"] . '" peso="' . $value["peso"] . '" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true"></i>

											</button>';

                                                    } else {

                                                        echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="' . $value["id"] . '" imagen="' . $config['backend'] . $imgValue . '" titulo="' . $value["titulo"] . '" precio="' . $value["precio"] . '" tipo="' . $value["tipo"] . '" peso="' . $value["peso"] . '" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true"></i>

											</button>';

                                                    }

                                                }

                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <hr>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>

                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <hr>


    </div>



<?php



