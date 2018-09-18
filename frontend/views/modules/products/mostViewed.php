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

        <div>

            <?php include "mostViewed/grid.php"; ?>

            <?php include "mostViewed/list.php"; ?>

        </div>
    </div>
</div>