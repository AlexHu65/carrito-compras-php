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


    static public function sqlSubCategories($table, $item , $value)
    {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" .$item, $value, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;

    }

}