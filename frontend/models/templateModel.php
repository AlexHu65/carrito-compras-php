<?php

require_once 'connection.php';

class templateModel
{
    /**
     * Get template style
     * @param $table
     * @return mixed
     */


    static public function mdlStyleTemplate($table)
    {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table");
        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();

        $stmt = null;

    }

    /** Get banner
     * @param $table
     * @return array
     */


    static public function mdlStyleBanner($table, $item, $value)
    {

        if ($item && !empty($item)) {
            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value);
            $stmt->execute();

            return $stmt->fetch();


        } else {

            $stmt = Connection::connect()->prepare("SELECT * FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();


        }

        $stmt->close();
        $stmt = null;


    }

}