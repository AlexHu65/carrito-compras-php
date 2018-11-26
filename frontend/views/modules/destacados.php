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

$modules = productsController::ctrListModules();

/**
 * Free module - all free products
 */


if ($modules[0]['shortname'] == 'free') {

    $order = "id";
    $item = "precio";
    $value = 0;
    $mode = 'DESC';
    $freeProducts = productsController::ctrProducts($order, $item, $value, $base, $top, $mode);

}

/**
 * Most Selled products - all most selled products
 */


if ($modules[1]['shortname'] == 'sell') {

    $order = "ventas";
    $item = null;
    $value = null;
    $mode = 'DESC';
    $selledProducts = productsController::ctrProducts($order, $item, $value, $base, $top, $mode);

}

/**
 * Most viewed products - all most selled products
 */


if ($modules[2]['shortname'] == 'views') {

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
                            <div class="col-xs-12 tituloDestacado">
                                <!----Title module----->
                                <div class="col-sm-6 col-xs-12">
                                    <h1>
                                        <small><?= $modules[$i]['title']; ?></small>
                                    </h1>
                                </div>
                                <!----End title module----->

                                <!-- Buttons group -->
                                <div class="col-sm-6 col-xs-12">
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
                                <!--End buttons group -->
                                <div class="clearfix"></div>
                                <hr>
                            </div>
                            <!-- titulo destacado-->
                        </div>
                        <div>
                            <!-- Show products grid-->
                            <?php
                            include '/products/grid.php';

                            include '/products/list.php';
                            ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            <hr>
        </div>
    </div>
<?php



