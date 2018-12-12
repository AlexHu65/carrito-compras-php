<?php


/*Controllers*/
require_once 'controllers/templateController.php';
require_once 'controllers/productsController.php';
require_once  'controllers/slideController.php';
require_once  'controllers/usersController.php';


/*Models*/
require_once 'models/templateModel.php';
require_once 'models/productsModel.php';
require_once 'models/slideModel.php';
require_once 'models/usersModel.php';

/*Config files*/
require_once 'config/routing.php';
require_once 'config/validators.php';


/*Extensions*/
require_once "extensions/PHPMailer/PHPMailerAutoload.php";
require_once "extensions/vendor/autoload.php";


/*Render vies and ctrTemplate*/
$template = new templateController();


$template->template();
