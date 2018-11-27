<?php

require_once 'connection.php';

class productsModel
{

    /**
     * Obtain product categories
     * @param $table
     * @param $item
     * @param $value
     * @return array|mixed
     */

    static public function sqlCategories($table, $item, $value)
    {

        if ($item != null) {

            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
            $stmt->close();
            $stmt = null;
        }

        $stmt = Connection::connect()->prepare("SELECT * FROM $table");
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;

    }

    /**
     * Obtain products sub-categories
     * @param $table
     * @param $item
     * @param $value
     * @return array
     */


    static public function sqlSubCategories($table, $item, $value)
    {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;

    }


    /**
     * @param $table
     * @param $order
     * @param string $item
     * @param $value
     * @param $base
     * @param $top
     * @param $mode
     * @return array
     */


    static public function sqlProducts($table, $order, $item = '', $value, $base, $top, $mode)
    {

        if ($item && !empty($item)) {
            $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY $order $mode LIMIT $base , $top");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();


        } else {

            $stmt = connection::connect()->prepare("SELECT * FROM $table ORDER BY $order $mode LIMIT $base , $top");
            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();
        $stmt = null;


    }

    /**
     * @param $table
     * @param $item
     * @param $value
     * @return array
     */


    static public function sqlInfoProducts($table, $item, $value)
    {

        $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;


    }

    /**
     * @param $table
     * @param $item
     * @param $value
     * @return mixed
     */

    static public function sqlProductInfo($table, $item, $value)
    {

        $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;


    }

    /**
     * @param $order
     * @param $item
     * @param $value
     * @param $table
     * @return array
     */

    static public function sqlListProducts($order, $item, $value, $table)
    {
        if ($item && !empty($item)) {

            $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY $order DESC ");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();

        } else {

            $stmt = connection::connect()->prepare("SELECT * FROM $table ORDER BY $order DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;

    }

    /**
     * @param $table
     * @param $search
     * @param $order
     * @param $mode
     * @param $base
     * @param $top
     * @return array
     */

    static public function sqlSearchProducts($table, $search, $order, $mode, $base, $top)
    {

        $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE ruta like '%$search%' OR titulo like '%$search%' OR titular like '%$search%' OR descripcion like '%$search%' ORDER BY $order $mode LIMIT $base, $top");

        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

        $stmt = null;

    }

    /**
     * @param $table
     * @param $search
     * @param $order
     * @param $mode
     * @param $base
     * @param $top
     * @return array
     */


    static public function sqlSearchSimilarProducts($table, $search, $order, $mode, $base, $top, $id, $category)
    {
        $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE id != :id AND id_categoria  = :category ORDER BY $order $mode LIMIT $base , $top");
        //$stmt = connection::connect()->prepare("SELECT * FROM $table WHERE id != :id AND id_categoria  = :category OR titulo LIKE :search1 ORDER BY $order $mode LIMIT $base , $top");
        //$stmt = connection::connect()->prepare("SELECT * FROM $table WHERE id != :id AND titulo LIKE :search1 AND id_categoria  = :category OR titulo LIKE :search2 ORDER BY $order $mode LIMIT $base , $top");

        // $search[0] = '%' . $search[0] . '%';

        $stmt->bindParam(":id", $id);
        //$stmt->bindParam(":search1", $search[0], PDO::PARAM_STR);
        $stmt->bindParam(":category", $category);


        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

        $stmt = null;

    }

    /**
     * @param $table
     * @param $search
     * @return array
     */

    static public function sqlListProductSearch($table, $search)
    {

        $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE ruta like '%$search%' OR titulo like '%$search%' OR titular like '%$search%' OR descripcion like '%$search%'");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;

    }

    /**
     * @param $table
     * @return array
     */

    static public function sqlListModules($table)
    {

        $stmt = connection::connect()->prepare("SELECT * FROM $table");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

}