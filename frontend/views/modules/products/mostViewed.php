<div class="container-fluid well well-sm barraProductos">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 organizarProductos">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default btnGrid" id="btnGrid1"><!-- Button grid  -->
                        <i class="fa fa-th" aria-hidden="true"></i>
                        <span class="col-xs-0 pull-right"> GRID</span>
                    </button><!-- .end Button Grid -->


                    <button type="button" class="btn btn-default btnList" id="btnList1"><!-- Button list  -->
                        <i class="fa fa-list " aria-hidden="true"></i>
                        <span class="col-xs-0 pull-right"> LIST</span>

                    </button><!-- .end Button List -->
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
                        <small>LO MAS VISTO</small>
                    </h1>
                </div>

                <div class="col-sm-6 col-xs-12">
                    <a href="lo-mas-vendido">
                        <button class="btn btn-default backColor pull-right">
                            VER MAS <span class="fa fa-chevron-right"></span>
                        </button>
                    </a>
                </div>
                <div class="clearfix"></div>
                <hr>

            </div><!-- . titulo destacado-->
        </div>

        <div><!-- Vitrina en cuadricula -->

            <ul class="grid1">

                <!--Producto 1-->

                <li class="col-md-3 col-sm-6 col-xs-12">
                    <figure>
                        <a href="#">
                            <img src="<?php echo $pathBackEnd; ?>/views/img/productos/cursos/curso05.jpg"
                                 class="img-responsive">
                        </a>
                    </figure>

                    <h4> <!-- Titulo -->
                        <small>
                            <a href="#" class="pixelProducto">

                                Curso Bootstrap<br>
                                <span class="label label-warning fontSize">50% off</span>

                            </a>
                        </small>
                    </h4>

                    <div class="col-xs-6 precio"> <!-- Precio -->
                        <h2>
                            <small>
                                <strong class="oferta">USD $100</strong>
                            </small>
                            <small>
                                $10
                            </small>
                        </h2>
                    </div>

                    <div class="col-xs-6 enlaces"><!-- Botones  -->
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs deseos" idProductos="470"
                                    data-toggle="tooltip" title="Agregar a mi lista de deseos">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </button>

                            <button type="button" class="btn btn-default btn-xs agregarCarrito" idProductos="450"
                                    imagen="<?php echo $pathBackEnd; ?>/views/img/productos/cursos/curso05.jpg"
                                    titulo="Curso Bootstrap" precio="10" tipo="virtual" peso="0"
                                    data-toggle="tooltip" title="Agregar al carrito">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </button>

                            <a href="#" class="pixelProducto">
                                <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip"
                                        title="Agregar al carrito">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </li>
                <!-- Producto 2 -->
                <li class="col-md-3 col-sm-6 col-xs-12">
                    <figure>
                        <a href="#">
                            <img src="<?php echo $pathBackEnd; ?>/views/img/productos/cursos/curso04.jpg"
                                 class="img-responsive">
                        </a>
                    </figure>

                    <h4> <!-- Titulo -->
                        <small>
                            <a href="#" class="pixelProducto">

                                Curso canvas y Javascript<br>
                                <span class="label label-warning fontSize">50% off</span>

                            </a>
                        </small>
                    </h4>

                    <div class="col-xs-6 precio"> <!-- Precio -->
                        <h2>
                            <small>
                                <strong class="oferta">USD $100</strong>
                            </small>
                            <small>
                                $10
                            </small>
                        </h2>
                    </div>

                    <div class="col-xs-6 enlaces"><!-- Botones  -->
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs deseos" idProductos="470"
                                    data-toggle="tooltip" title="Agregar a mi lista de deseos">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </button>

                            <button type="button" class="btn btn-default btn-xs agregarCarrito" idProductos="450"
                                    imagen="<?php echo $pathBackEnd; ?>/views/img/productos/cursos/curso04.jpg"
                                    titulo="Curso canvas y Javascript" precio="10" tipo="virtual" peso="0"
                                    data-toggle="tooltip" title="Agregar al carrito">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </button>

                            <a href="#" class="pixelProducto">
                                <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip"
                                        title="Agregar al carrito">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </li>
                <!-- Producto 3 -->
                <li class="col-md-3 col-sm-6 col-xs-12">
                    <figure>
                        <a href="#">
                            <img src="<?php echo $pathBackEnd; ?>/views/img/productos/cursos/curso02.jpg"
                                 class="img-responsive">
                        </a>
                    </figure>

                    <h4> <!-- Titulo -->
                        <small>
                            <a href="#" class="pixelProducto">

                                Aprende JS desde 0<br>
                                <span class="label label-warning fontSize">50% off</span>

                            </a>
                        </small>
                    </h4>

                    <div class="col-xs-6 precio"> <!-- Precio -->
                        <h2>
                            <small>
                                <strong class="oferta">USD $100</strong>
                            </small>
                            <small>
                                $10
                            </small>
                        </h2>
                    </div>

                    <div class="col-xs-6 enlaces"><!-- Botones  -->
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs deseos" idProductos="470"
                                    data-toggle="tooltip" title="Agregar a mi lista de deseos">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </button>

                            <button type="button" class="btn btn-default btn-xs agregarCarrito" idProductos="450"
                                    imagen="<?php echo $pathBackEnd; ?>/views/img/productos/cursos/curso02.jpg"
                                    titulo="Aprende JS desde 0" precio="10" tipo="virtual" peso="0"
                                    data-toggle="tooltip" title="Agregar al carrito">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </button>

                            <a href="#" class="pixelProducto">
                                <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip"
                                        title="Agregar al carrito">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </li>
                <!-- Producto 4 -->
                <li class="col-md-3 col-sm-6 col-xs-12">
                    <figure>
                        <a href="#">
                            <img src="<?php echo $pathBackEnd; ?>/views/img/productos/cursos/curso03.jpg"
                                 class="img-responsive">
                        </a>
                    </figure>

                    <h4> <!-- Titulo -->
                        <small>
                            <a href="#" class="pixelProducto">

                                Curso de JQuery<br>
                                <span class="label label-warning fontSize">50% off</span>

                            </a>
                        </small>
                    </h4>

                    <div class="col-xs-6 precio"> <!-- Precio -->
                        <h2>
                            <small>
                                <strong class="oferta">USD $100</strong>
                            </small>
                            <small>
                                $10
                            </small>
                        </h2>
                    </div>

                    <div class="col-xs-6 enlaces"><!-- Botones  -->
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs deseos" idProductos="470"
                                    data-toggle="tooltip" title="Agregar a mi lista de deseos">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </button>

                            <button type="button" class="btn btn-default btn-xs agregarCarrito" idProductos="450"
                                    imagen="<?php echo $pathBackEnd; ?>/views/img/productos/cursos/curso03.jpg"
                                    titulo="Curso de JQuery" precio="10" tipo="virtual" peso="0"
                                    data-toggle="tooltip" title="Agregar al carrito">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </button>

                            <a href="#" class="pixelProducto">
                                <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip"
                                        title="Agregar al carrito">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </li>


            </ul>
        </div>
    </div>
</div>