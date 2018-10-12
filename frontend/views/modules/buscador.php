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

                        echo '<li><a href="' . $config['frontend'] . $paths[0] . '/1/recientes/' . $paths[3] . '">Reciente</a></li>
							  <li><a href="' . $config['frontend'] . $paths[0] . '/1/antiguos/' . $paths[3] . '">Antiguo</a></li>';

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
            <!--=====================================
			BREADCRUMB O MIGAS DE PAN
			======================================-->

            <ul class="breadcrumb fondoBreadCrumb">
                <li><a href="<?= $config['frontend']; ?>">Home</a></li>
                <li class="active pagActiva"><?php echo $paths[0] ?></li>

            </ul>
            <?php

            /*=============================================
            LLAMADO DE PAGINACIÓN
            =============================================*/

            if (isset($paths[1])) {

                if (isset($paths[2])) {

                    if ($paths[2] == "antiguos") {

                        $mode = "ASC";
                        $_SESSION["order"] = "ASC";

                    } else {

                        $mode = "DESC";
                        $_SESSION["order"] = "DESC";

                    }

                } else {

                    $mode = $_SESSION["order"];

                }

                $base = ($paths[1] - 1) * 12;
                $top = 12;

            } else {

                $paths[1] = 1;
                $base = 0;
                $top = 12;
                $mod3 = "DESC";

            }

            /*=============================================
			LLAMADO DE PRODUCTOS POR BÚSQUEDA
			=============================================*/

            $products3 = null;
            $listProducts = null;

            $order = "id";

            if (isset($paths[3])) {

                $search = $paths[3];

                $products3 = productsController::ctrSearchProducts($search, $order, $mode, $base, $top);
                $listProducts = productsController::ctrListarProductosBusqueda($search);

            }

            if (!$products3) {

                echo '<div class="col-xs-12 error404  text-center">

						 <h1><small>¡Oops!</small></h1>

						 <h2>A&uacute;n no hay productos en esta sección</h2>
						 
						 

					</div><hr>';

            } else { ?>

                <ul class="grid0">

                    <?php

                    foreach ($products3 as $key => $value) { ?>

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
                                <?php // echo 'ID' . $value['id']; ?>

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

                    <?php foreach ($products3 as $key => $value) { ?>

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
                    <?php

                    if (count($listProducts) != 0) {

                        $pagProductos = ceil(count($listProducts) / 12);

                        if ($pagProductos > 4) {

                            /*=============================================
                            LOS BOTONES DE LAS PRIMERAS 4 PÁGINAS Y LA ÚLTIMA PÁG
                            =============================================*/

                            if ($paths[1] == 1) {

                                echo '<ul class="pagination">';

                                for ($i = 1; $i <= 4; $i++) {

                                    echo '<li id="item' . $i . '"><a href="' . $config['frontend'] . $paths[0] . '/' . $i . '/' . $paths[2] . '/' . $paths[3] . '">' . $i . '</a></li>';

                                }
                                echo '<li class="page-item" data-toggle="tooltip" data-original-title="Siguiente"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/2/' . $paths[2] . '/' . $paths[3] . '"><i class="fa fa-angle-right"></i></a></li>';
                                echo '<li class="page-item" data-toggle="tooltip" data-original-title="&Uacute;ltima p&aacute;gina"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . $pagProductos . '/'.$paths[2].'/'.$paths[3].'"><i class="fa fa-angle-double-right"></i></a></li>';
                                echo '</ul>';


                                /*    echo '<li id="item' . $pagProductos . '"><a href="' . $config['frontend'] . $paths[0] . '/' . $pagProductos . '/' . $paths[2] . '/' . $paths[3] . '">' . $pagProductos . '</a></li>
                                       <li><a href="' . $config['frontend'] . $paths[0] . '/2/' . $paths[2] . '/' . $paths[3] . '"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                                </ul>';*/

                            } /*=============================================
                        LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
                        =============================================*/

                            else if ($paths[1] != $pagProductos &&
                                $paths[1] != 1 &&
                                $paths[1] < ($pagProductos / 2) &&
                                $paths[1] < ($pagProductos - 3)
                            ) {

                                $numPagActual = $paths[1];

                                echo '<ul class="pagination">';
                                echo '<li class="page-item" data-toggle="tooltip" data-original-title="Primera p&aacute;gina"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/1/' . $paths[2] . '/' . $paths[3] . '"><i class="fa fa-angle-double-left"></i></a></li>';
                                echo '<li class="page-item" data-toggle="tooltip" data-original-title="Anterior"><a href="' . $config['frontend'] . $paths[0] . '/' . ($numPagActual - 1) . '/' . $paths[2] . '/' . $paths[3] . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';

                                for ($i = $numPagActual; $i <= ($numPagActual + 3); $i++) {

                                    echo '<li class="page-item ' . ($numPagActual == $i ? 'active' : '') . ' id="item' . $i . '"><a href="' . $config['frontend'] . $paths[0] . '/' . $i . '/' . $paths[2] . '/' . $paths[3] . '">' . $i . '</a></li>';

                                }

                                echo '<li class="page-item" data-toggle="tooltip" data-original-title="Siguiente"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . ($numPagActual + 1) . '/' . $paths[2] . '/' . $paths[3] . '"><i class="fa fa-angle-right"></i></a></li>';
                                echo '<li class="page-item" data-toggle="tooltip" data-original-title="&Uacute;ltima p&aacute;gina"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . $pagProductos . '/'.$paths[2].'/'.$paths[3].'"><i class="fa fa-angle-double-right"></i></a></li>';
                                echo '</ul>';

                            } /*=============================================
                        LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
                        =============================================*/

                            else if ($paths[1] != $pagProductos &&
                                $paths[1] != 1 &&
                                $paths[1] >= ($pagProductos / 2) &&
                                $paths[1] < ($pagProductos - 3)
                            ) {

                                $numPagActual = $paths[1];

                                echo '<ul id="paginationProducts" class="pagination">';
                                echo '<li class="page-item" data-toggle="tooltip" data-original-title="Primera p&aacute;gina"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/1/' . $paths[2] . '/' . $paths[3] . '"><i class="fa fa-angle-double-left"></i></a></li>';
                                echo '<li class="page-item" data-toggle="tooltip" data-original-title="Anterior"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . ($numPagActual - 1) . '/' . $paths[2] . '/' . $paths[3] . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';


                                for ($i = $numPagActual; $i <= ($numPagActual + 3); $i++) {

                                    echo '<li  class="page-item ' . ($numPagActual == $i ? 'active' : '') . ' id="item' . $i . '"><a href="' . $config['frontend'] . $paths[0] . '/' . $i . '/' . $paths[2] . '/' . $paths[3] . '">' . $i . '</a></li>';

                                }

                                echo '<li class="page-item" data-toggle="tooltip" data-original-title="Siguiente" ><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . ($numPagActual + 1) . '/' . $paths[2] . '/' . $paths[3] . '"><i class="fa fa-angle-right"></i></a></li>';
                                echo '<li class="page-item" data-toggle="tooltip" data-original-title="&Uacute;ltima p&aacute;gina" ><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . $pagProductos . '/'.$paths[2].'/'.$paths[3].'"><i class="fa fa-angle-double-right"></i></a></li>';


                                echo '</ul>';

                            } /*=============================================
                        LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG
                        =============================================*/

                            else {

                                $numPagActual = $paths[1];

                                echo '<ul id="paginationProducts" class="pagination">';
                                echo '<li class="page-item" data-toggle="tooltip" data-original-title="Primera p&aacute;gina"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/1/' . $paths[2] . '/' . $paths[3] . '"><i class="fa fa-angle-double-left"></i></a></li>';
                                echo '<li class="page-item" data-toggle="tooltip" data-original-title="Anterior"><a class="page-link" href="' . $config['frontend'] . $paths[0] . '/' . ($numPagActual - 1) . '/' . $paths[2] . '/' . $paths[3] . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';


                                /* echo '<ul class="pagination">
                                    <li><a href="' . $config['frontend'] . $paths[0] . '/' . ($numPagActual - 1) . '/' . $paths[2] . '/' . $paths[3] . '"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                    <li id="item1"><a href="' . $config['frontend'] . $paths[0] . '/1/' . $paths[2] . '/' . $paths[3] . '">1</a></li>

                                 ';*/

                                for ($i = ($pagProductos - 3); $i <= $pagProductos; $i++) {

                                    echo '<li class="page-item ' . ($numPagActual == $i ? 'active' : '') . ' id="item' . $i . '"><a href="' . $config['frontend'] . $paths[0] . '/' . $i . '/' . $paths[2] . '/' . $paths[3] . '">' . $i . '</a></li>';

                                }

                                echo ' </ul>';

                            }

                        } else {

                            echo '<ul class="pagination">';
                            for ($i = 1; $i <= $pagProductos; $i++) {

                                echo '<li class="page-item ' . ($paths[1] == $i ? 'active' : '') . ' id="item' . $i . '"><a href="' . $config['frontend'] . $paths[0] . '/' . $i . '/' . $paths[2] . '/' . $paths[3] . '">' . $i . '</a></li>';

                            }

                            echo '</ul>';

                        }

                    }
                    ?>


                </center>


            <?php }


            ?>

        </div>
    </div>

</div>


