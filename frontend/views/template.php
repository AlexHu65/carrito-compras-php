<?php

session_start();

$config = [
    'backend' => routing::selectRouteBackEnd(),
    'frontend' => routing::selectRouteFrontEnd(),
    'ctrTemplate' => templateController::ctrStyleTemplate(),
    'categories' => productsController::ctrCategories(),
    'slide' => slideController::ctrGetSlide()
];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="title" content="Tienda virtual">
    <meta name="descripcion" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad aliquam commodi consequuntur dolor facilis incidunt
magnam nam nisi numquam odit quaerat, repellat, rerum sint sunt ullam, voluptatem voluptatibus. Labore?">

    <meta name="keyword" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad aliquam commodi consequuntur dolor facilis incidunt
magnam nam nisi numquam odit quaerat, repellat, rerum sint sunt ullam, voluptatem voluptatibus. Labore?">


    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">


    <title> Tienda | Online</title>


    <link rel="icon"
          href="<?= $config['frontend'] ?>views/img/template/<?= $config['ctrTemplate']['icono']; ?>">

    <!-- css bootstrap min -->
    <link rel="stylesheet" href="<?= $config['frontend'] ?>views/css/plugins/bootstrap.min.css">

    <!-- css font awesome -->

    <link rel="stylesheet" href="<?= $config['frontend'] ?>views/css/plugins/font-awesome.min.css">


    <!-- css custom -->

    <link rel="stylesheet" href="<?= $config['frontend'] ?>views/css/global.css">

    <!-- css header -->

    <link rel="stylesheet" href="<?= $config['frontend'] ?>views/css/header.css">

    <!-- css products -->

    <link rel="stylesheet" href="<?= $config['frontend'] ?>views/css/productos.css">

    <!-- css info product -->

    <link rel="stylesheet" href="<?= $config['frontend'] ?>views/css/infoproduct.css">


    <!-- css footer product -->

    <link rel="stylesheet" href="<?= $config['frontend'] ?>views/css/footer.css">


    <!-- css flex slider -->

    <link rel="stylesheet" href="<?= $config['frontend'] ?>views/css/plugins/flexslider.css">

    <!-- css sweet alert -->

    <link rel="stylesheet" href="<?= $config['frontend'] ?>views/css/plugins/sweetalert.css">


    <!-- slide css -->

    <link rel="stylesheet" href="<?= $config['frontend'] ?>views/css/slide.css">

    <!-- slide css -->

    <link rel="stylesheet" href="<?= $config['frontend'] ?>views/css/profile.css">



    <!-- Plugin jquery -->

    <script src="<?= $config['frontend'] ?>views/js/plugins/jquery.min.js"></script>

    <!-- Plugin bootstrap min -->

    <script src="<?= $config['frontend'] ?>views/js/plugins/bootstrap.min.js"></script>

    <!-- Flexible slider -->

    <script src="<?= $config['frontend'] ?>views/js/plugins/jquery.flexslider.js"></script>

    <!-- Sweet alert -->
    <script src="<?= $config['frontend'] ?>views/js/plugins/sweetalert.min.js"></script>




</head>
<body>
<div class="supreme-container">

    <!-- Include header module -->
    <?php

    include 'modules/header.php';


    $paths = [];
    $path = null;

    if (isset($_GET['path'])) {

        $paths = explode('/', $_GET['path']);

        $validators = new validators();


        if (isset($paths[1]) && $paths[1] == '') {

            unset($paths[1]);

        } else if (isset($paths[1]) && $paths[1] <= 0) {

            unset($paths[1]);


        }

        //Value from the database
        $item = 'ruta';
        $value = $paths[0];
        $infoProduct = '';


        //Obtain all pathFrontEnd from the category---------------------


        $routesCategories = productsController::ctrCategories($item, $value);
        if ($paths[0] == $routesCategories['ruta']) {
            $path = $paths[0];
        }

        //Obtain all subcategories-------------------------------------


        $routesSubCategories = productsController::ctrSubCategories($item, $value);
        foreach ($routesSubCategories as $key => $subCategory) {
            if ($paths[0] == $subCategory['ruta']) {
                $path = $paths[0];
            }
        }


        //Obtain products path----------------------------------------------

        $routesProducts = productsController::ctrInfoProduct($item, $value);
        foreach ($routesProducts as $key => $info) {
            if ($paths[0] == $info['ruta']) {
                $infoProduct = $paths[0];
            }
        }

        /*------------------------------------------------------------------*/


        if ($path != null ||
            $paths[0] == "articulos-gratis" ||
            $paths[0] == "lo-mas-vendido" ||
            $paths[0] == "lo-mas-visto"
        ) {

            include 'modules/products.php';

        } else if ($routesProducts != null) {

            include 'modules/products/infoproduct.php';

        } else if ($paths[0] == 'buscador' || $paths[0] == 'verificar' || $paths[0] == "logout" || $paths[0] == "profile" ) {

            include 'modules/' . $paths[0] . '.php';




        } else {

            include "modules/404.php";
        }

    } else {

        include "modules/slide.php";
        include "modules/destacados.php";
    }




    ?>

</div>


<div style="margin: 0; padding: 0;" class="container-fluid">
    <div class="col-xs-12">

        <div class="row">
            <?php include 'modules/footer.php'; ?>

        </div>

    </div>
</div>
<!-- end footer -->

<?php

include 'modules/modals/search.php';
include 'modules/modals/menu.php';
include 'modules/modals/login.php';
include 'modules/modals/register.php';
include 'modules/modals/password.php';
include 'modules/modals/comments.php';

?>


<div id="searchFloat" class="btn btn-default" data-toggle="modal"
     data-target="#searchModal">
    <i class="fa fa-search"></i>
</div>

<div id="menuFloat" class="btn btn-default" data-toggle="modal"
     data-target="#menuModal">
    <i class="fa fa-bars"></i>
</div>

<input id="pathFrontEnd" type="hidden" value="<?= $config['frontend'] ?>">

<!-- facebook login -->

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '203597013913742',
            cookie     : true,
            xfbml      : true,
            version    : 'v3.2'
        });

        FB.AppEvents.logPageView();

    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>



<script src="<?= $config['frontend'] ?>views/js/cabezote.js"></script>

<script src="<?= $config['frontend'] ?>views/js/plantilla.js"></script>

<script src="<?= $config['frontend'] ?>views/js/slide.js"></script>

<script src="<?= $config['frontend'] ?>views/js/infoproduct.js"></script>

<script src="<?= $config['frontend'] ?>views/js/plugins/jquery.easing.js"></script>

<script src="<?= $config['frontend'] ?>views/js/plugins/jquery.scrollUp.js"></script>

<script src="<?= $config['frontend'] ?>views/js/plugins/jquery.flexslider.js"></script>

<script src="<?= $config['frontend'] ?>views/js/search.js"></script>

<script src="<?= $config['frontend'] ?>views/js/users.js"></script>

<script src="<?= $config['frontend'] ?>views/js/loginfb.js"></script>



</body>
</html>