<?php

include 'products/banner.php';
?>

<div class="container-fluid barraProductos">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-xs-12 ordenarProductos">
                <!-- Order products -->
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        Ordenar Productos <span class="caret"></span>

                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        echo '<li><a href="' . $config['frontend'] . $paths[0] . '/1/reciente">Recientes</a></li>
                        <li><a href="' . $config['frontend'] . $paths[0] . '/1/antiguo">Antiguo</a></li>';
                        ?>
                    </ul>
                </div>
                <!--End order products -->
            </div>

            <div class="col-sm-6 col-xs-12 organizarProductos">
                <div class="pull-right">
                    <button type="button" class="btn btn-default btnList" id="btnList0" data-toggle="tooltip"
                            title="Ver en lista">
                        <i class="fa fa-list " aria-hidden="true"></i>

                    </button>
                    <button type="button" class="btn btn-default btnGrid" id="btnGrid0" data-toggle="tooltip"
                            title="Ver en cuadr&iacute;cula">
                        <i class="fa fa-th" aria-hidden="true"></i>

                    </button>


                </div>
            </div>
        </div>
    </div>
</div>

<hr>

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
            <hr>
            <?php

            $order = 'id';

            if (isset($paths[1])) {

                if (isset($paths[2])) {

                    if ($paths[2] == 'antiguo') {

                        $mode = 'ASC';

                        $_SESSION['order'] = $mode;

                    } else {
                        $mode = 'DESC';
                        $_SESSION['order'] = $mode;

                    }
                } else {

                    $_SESSION['order'] = 'DESC';
                    $mode =  $_SESSION['order'];

                }
                $base = ($paths[1] - 1) * 12;
                $top = 12;


            } else {

                $paths[1] = 1;
                $base = 0;
                $top = 12;
                $mode = 'DESC';

            }

            if ($paths[0] == 'articulos-gratis') {

                $order = "id";
                $item2 = "precio";
                $value2 = 0;


            } else if ($paths[0] == 'lo-mas-vendido') {

                $order = "ventas";
                $item2 = null;
                $value2 = null;


            } else if ($paths[0] == 'lo-mas-visto') {

                $order = "vistas";
                $item2 = null;
                $value2 = null;


            } else {

                $item1 = 'ruta';
                $value1 = $paths[0];
                $category = productsController::ctrCategories($item1, $value1);

                if (!$category) {

                    $subcategory = productsController::ctrSubCategories($item1, $value1);
                    $item2 = 'id_subcategoria';
                    $value2 = $subcategory[0]['id'];

                } else {

                    $item2 = 'id_categoria';
                    $value2 = $category['id'];
                }

            }

            $products2 = productsController::ctrProducts($order, $item2, $value2, $base, $top, $mode);
            $listProducts = productsController::ctrListProducts($order, $item2, $value2);

            if (!$products2) { ?>

                <div class="col-xs-12 error404 text-center">
                    <h1>
                        <small>Ooop!</small>
                    </h1>
                    <h2>Aun no hay productos en esta seccion</h2>
                </div>


            <?php } else { ?>

                <ul class="grid0">

                    <?php

                    foreach ($products2 as $key => $value) { ?>

                        <li class="col-md-3 col-sm-6 col-xs-12">

                            <figure>

                                <a href="<?= $config['frontend'] . $value["ruta"]; ?>" class="pixelProducto">

                                    <?php
                                    //Todo: Remove this variable , it is only for tests on local side
                                    $imgValue = 'views' . substr($value['portada'], strlen('vistas'));
                                    ?>
                                    <img src="<?= $config['backend'] . $imgValue; ?>" class="img-responsive">

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
                                <?php echo 'ID' . $value['id']; ?>

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

                                    <a href="<?= $config['frontend'] . $value["ruta"]; ?>" class="pixelProducto">

                                        <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip"
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
                <ul class="list0" style="display:none">

                    <?php foreach ($products2 as $key => $value) { ?>

                        <li class="col-xs-12">
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                <figure>

                                    <a href="<?= $config['frontend'] . $value["ruta"] ?>" class="pixelProducto">
                                        <?php
                                        //Todo: Remove this variable , it is only for tests on local side
                                        $imgValue = 'views' . substr($value['portada'], strlen('vistas'));
                                        ?>

                                        <img src="<?= $config['backend'] . $imgValue; ?>" class="img-responsive">

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

                                    </button>

                                    <a href="<?= $value["ruta"]; ?>" class="pixelProducto">

                                        <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip"
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

                <div class="clearfix"></div>

                <center>

                    <?php if (count($listProducts) != 0) {

                        include 'pagination.php';


                    } ?>


                </center>


            <?php } ?>
        </div>

    </div>
</div>



