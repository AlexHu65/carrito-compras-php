<div class="container-fluid well well-sm barraProductos">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 organizarProductos">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default btnGrid" id="btnGrid<?= $i ?>">
                        <i class="fa fa-th" aria-hidden="true"></i>
                        <!--<span class="col-xs-0 pull-right"> GRID</span>-->
                    </button>

                    <button type="button" class="btn btn-default btnList" id="btnList<?= $i ?>">
                        <i class="fa fa-list " aria-hidden="true"></i>
                        <!--<span class="col-xs-0 pull-right"> LIST</span>-->

                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <a href="<?= $modules[$i]['path']; ?>">
                        <button class="btn btn-default backColor pull-right">
                            VER MAS <span class="fa fa-chevron-right"></span>
                        </button>
                    </a>
                </div>
                <div class="clearfix"></div>
                <hr>

            </div><!-- . titulo destacado-->
        </div>
        <div>
            <!-- Show products -->
            <ul class="grid<?= $i; ?>">
                <?php

                foreach ($modulesInfo[$i] as $key => $value) { ?>

                    <li class="col-md-3 col-sm-6 col-xs-12">

                        <figure>

                            <a href="<?= $value["ruta"] ?>" class="pixelProducto">

                                <?php
                                //Todo: Remove this variable , it is only for tests on local side
                                $imgValue = 'views' . substr($value['portada'], strlen('vistas'));
                                ?>
                                <img src="<?= $pathBackEnd . $imgValue; ?>" class="img-responsive">

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

                                <a href="<?= $value["ruta"]; ?>;" class="pixelProducto">

                                    <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip"
                                            title="Ver producto">

                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                    </button>

                                </a>

                                <?php

                                if ($value["tipo"] == "virtual" && $value["precio"] != 0) {

                                    if ($value["oferta"] != 0) {

                                        echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="' . $value["id"] . '" imagen="' . $pathBackEnd . $imgValue . '" titulo="' . $value["titulo"] . '" precio="' . $value["precioOferta"] . '" tipo="' . $value["tipo"] . '" peso="' . $value["peso"] . '" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true"></i>

											</button>';

                                    } else {

                                        echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="' . $value["id"] . '" imagen="' . $pathBackEnd . $imgValue . '" titulo="' . $value["titulo"] . '" precio="' . $value["precio"] . '" tipo="' . $value["tipo"] . '" peso="' . $value["peso"] . '" data-toggle="tooltip" title="Agregar al carrito de compras">

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