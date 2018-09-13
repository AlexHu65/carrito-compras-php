<?php


class productsController
{

    static public function requestCategories($item = null , $value = null)
    {

        $table = 'categorias';
        $response = productsModel::sqlCategories($table ,$item , $value);

        return $response;

    }

    static public function requestSubCategories($item, $value)
    {
        $table = 'subcategorias';
        $response = productsModel::sqlSubCategories($table, $item ,$value);
        return $response;

    }


}