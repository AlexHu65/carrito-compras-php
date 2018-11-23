<?php


class productsController
{

    /**
     * Product categories
     * @param null $item
     * @param null $value
     * @return array|mixed
     */

    static public function ctrCategories($item = null, $value = null)
    {

        $table = 'categorias';
        $response = productsModel::sqlCategories($table, $item, $value);
        return $response;

    }

    /**
     * Products sub categories
     * @param $item
     * @param $value
     * @return array
     */

    static public function ctrSubCategories($item, $value)
    {
        $table = 'subcategorias';
        $response = productsModel::sqlSubCategories($table, $item, $value);
        return $response;

    }


    /**
     * Return a base and top products
     * @param $order
     * @param $item
     * @param $value
     * @param $base
     * @param $top
     * @return array
     */

    static public function ctrProducts($order, $item, $value, $base, $top , $mode)
    {
        $table = 'productos';
        $response = productsModel::sqlProducts($table, $order, $item, $value, $base, $top ,$mode);
        return $response;
    }

    /**
     * Info product depends id product
     * @param $item
     * @param $value
     * @return array
     */


    static public function ctrInfoProduct($item, $value)
    {
        $table = 'productos';
        $response = productsModel::sqlInfoProducts($table, $item, $value);
        return $response;


    }

    /**
     * Info product depends id product
     * @param $item
     * @param $value
     * @return array
     */


    static public function ctrProductInfo($item, $value)
    {
        $table = 'productos';
        $response = productsModel::sqlProductInfo($table, $item, $value);
        return $response;


    }

    /**
     *Return a list of products
     * @param $order
     * @param $item
     * @param $value
     * @return array
     */

    static public function ctrListProducts($order, $item, $value)
    {

        $table = 'productos';
        $response = productsModel::sqlListProducts($order, $item, $value, $table);
        return $response;

    }

    static public function ctrSearchProducts($search, $order, $mode, $base, $top){

        $table = "productos";

        $response = productsModel::sqlSearchProducts($table, $search, $order, $mode, $base, $top);

        return $response;

    }

    static public function ctrListarProductosBusqueda($busqueda){

        $table = "productos";

        $response = productsModel::sqlListProductSearch($table, $busqueda);

        return $response;

    }


}