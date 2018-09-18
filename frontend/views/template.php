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

    <title> Tienda | Online</title>

    <?php

    $icon = templateController::ctrStyleTemplate();

    $route = new routes();
    $pathFrontEnd = $route->selectRoute();
    $pathBackEnd = $route->selectRoute('backend');

    ?>

    <link rel="icon"
          href="http://localhost:8080/Udemy/carrito-compras-php/backend/views/img/template/<?php echo $icon['icono'] ?>">

    <!-- css bootstrap min -->
    <link rel="stylesheet" href="<?php echo $pathFrontEnd; ?>views/css/plugins/bootstrap.min.css">

    <!-- css font awesome -->

    <link rel="stylesheet" href="<?php echo $pathFrontEnd; ?>views/css/plugins/font-awesome.min.css">


    <!-- css custom -->

    <link rel="stylesheet" href="<?php echo $pathFrontEnd; ?>views/css/global.css">


    <link rel="stylesheet" href="<?php echo $pathFrontEnd; ?>views/css/productos.css">

    <!-- css header -->
    <link rel="stylesheet" href="<?php echo $pathFrontEnd; ?>views/css/header.css">

    <!-- slide css -->

    <link rel="stylesheet" href="<?php echo $pathFrontEnd; ?>views/css/slide.css">


    <!-- Plugin jquery -->

    <script src="<?php echo $pathFrontEnd; ?>views/js/plugins/jquery.min.js"></script>

    <!-- Plugin bootstrap min -->

    <script src="<?php echo $pathFrontEnd; ?>views/js/plugins/bootstrap.min.js"></script>

</head>
<body>

<!-- Include header module -->
<?php include 'modules/header.php';

$paths = [];
$path = null;

if (isset($_GET['path'])) {

    $paths = explode('/', $_GET['path']);


    //Value from the database
    $item = 'ruta';
    $value = $_GET['path'];

    //Obtain all pathFrontEnd from the category

    $routesCategories = productsController::requestCategories($item, $value);

    if ($paths[0] == $routesCategories['ruta']) {

        $path = $paths[0];
    }

    //Obtain all pathFrontEnd from the subcategories

    $routesSubCategories = productsController::requestSubCategories($item, $value);

    foreach ($routesSubCategories as $key => $value) {

        if ($paths[0] == $value['ruta']) {
            $path = $paths[0];
        }
    }

    if ($path != null) {

        include 'modules/products.php';
    } else {

        include 'modules/404.php';
    }

} else {

    include 'modules/slide.php';
    include 'modules/destacados.php';
}

?>

<script src="<?php echo $pathFrontEnd; ?>views/js/cabezote.js"></script>

<script src="<?php echo $pathFrontEnd; ?>views/js/plantilla.js"></script>

<script src="<?php echo $pathFrontEnd; ?>views/js/slide.js"></script>

<script src="<?php echo $pathFrontEnd; ?>views/js/plugins/jquery.easing.js"></script>


</body>
</html>