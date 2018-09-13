<?php

require_once '../controllers/templateController.php';
require_once '../models/templateModel.php';


class templateAjax
{
    public function ajaxStyleTemplate(){

        //use an static method to use template ctr style
        $response = templateController::ctrStyleTemplate();

        echo json_encode($response, true);
    }
}


$object = new templateAjax();
$object->ajaxStyleTemplate();