<ul class="list<?= $i; ?>" style="display:none">

    <?php foreach ($modulesInfo[$i] as $key => $value) { ?>

        <li class="col-xs-12">
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                <!-- thumbnail -->
                <figure>
                    <?php

                    echo '<a href="' . $value["ruta"] . '" class="pixelProducto">';
                    //Todo: Remove this variable , it is only for tests on local side
                    $imgValue = 'views' . substr($value['portada'], strlen('vistas'));
                    echo '<img src="' . $config['backend'] . $imgValue . '"class="img-responsive">';
                    echo '</a>';

                    ?>
                </figure>
                <!-- end thumbnail -->
            </div>
            <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">
                <h1>
                    <small>
                        <?php

                        echo '<a href="' . $value["ruta"] . '" class="pixelProducto">';
                        echo '<a href="' . $value["ruta"] . '" class="pixelProducto">';
                        echo $value["titulo"] . '<br>';
                        echo '<span style="color:rgba(0,0,0,0)">-</span>';
                        echo '<span class="label label-warning fontSize">' . ($value['nuevo'] != 0 ? 'Nuevo' : '') . '</span>';
                        echo '<span class="label label-warning fontSize">' . ($value['oferta'] != 0 ? $value['descuentoOferta'] . '% off' : '') . '</span>';
                        echo '</a>';
                        ?>

                    </small>
                </h1>
                <p class="text-muted"><?= $value["titular"]; ?></p>

                <?php

                if ($value["precio"] == 0) {
                    echo '<h2><small>GRATIS</small></h2>';
                } else {

                    if ($value["oferta"] != 0) {

                        echo '<h2>';
                        echo '<small>';
                        echo '<strong class="oferta">USD $' . $value["precio"] . '</strong>';
                        echo '</small>';
                        echo '<small>$' . $value["precioOferta"] . '</small>';
                        echo '</h2>';

                    } else {
                        echo '<h2><small>USD $' . $value["precio"] . '</small></h2>';
                    }

                } ?>

                <div class="btn-group pull-left enlaces">

                    <?php
                    echo '<button type="button" class="btn btn-default btn-xs deseos"';
                    echo 'idProducto="' . $value["id"] . '" data-toggle="tooltip"';
                    echo 'title="Agregar a mi lista de deseos">';
                    echo '<i class="fa fa-heart" aria-hidden="true"></i>';
                    echo '</button> ';


                    echo '<a href="' . $value["ruta"] . '" class="pixelProducto">';
                    echo '<button type="button" class="btn btn-default btn-xs"';
                    echo 'data-toggle="tooltip"';
                    echo 'title="Ver producto">';
                    echo '<i class="fa fa-eye" aria-hidden="true"></i>';
                    echo '</button>';
                    echo '</a>';

                    if ($value["tipo"] == "virtual" && $value["precio"] != 0) {

                        if ($value["oferta"] != 0) {

                            echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="' . $value["id"] . '" imagen="' . $config['backend'] . $imgValue . '" titulo="' . $value["titulo"] . '" precio="' . $value["precioOferta"] . '" tipo="' . $value["tipo"] . '" peso="' . $value["peso"] . '" data-toggle="tooltip" title="Agregar al carrito de compras">';
                            echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
                            echo '</button>';

                        } else {

                            echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="' . $value["id"] . '" imagen="' . $config['backend'] . $imgValue . '" titulo="' . $value["titulo"] . '" precio="' . $value["precio"] . '" tipo="' . $value["tipo"] . '" peso="' . $value["peso"] . '" data-toggle="tooltip" title="Agregar al carrito de compras">';
                            echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
                            echo '</button>';

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