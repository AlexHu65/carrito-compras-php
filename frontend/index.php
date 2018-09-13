<?php


/*Controllers*/
require_once 'controllers/templateController.php';
require_once 'controllers/productsController.php';
require_once  'controllers/slideController.php';


/*Models*/
require_once 'models/templateModel.php';
require_once 'models/productsModel.php';
require_once 'models/slideModel.php';

/*Config files*/
require_once 'config/routes.php';


/*Render vies and template*/
$template = new templateController();
$template->template();
