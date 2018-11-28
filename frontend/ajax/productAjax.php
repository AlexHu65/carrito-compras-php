<?php

require_once '../controllers/productsController.php';
require_once '../models/productsModel.php';


class productAjax
{

    public $value;
    public $item;
    public $id;

    public function ajaxViewProducts(){

        $data = [
            "value" => $this ->value ,
            "item" => $this->item,
            "id" => $this->id
        ];

        //use an static method to use ctrTemplate ctr style
        $response = productsController::ctrProductsViews($data);

        echo  $response;
    }
}


if (isset($_POST['value'])){

    $views = new productAjax();
    $views-> value = $_POST['value'];
    $views-> item = $_POST['item'];
    $views-> id = $_POST['id'];
    $views->ajaxViewProducts();
}

