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
require_once 'config/routing.php';
require_once 'config/validators.php';


/*Render vies and ctrTemplate*/
$template = new templateController();


$template->template();
