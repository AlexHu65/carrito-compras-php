<?php

require_once 'connection.php';
class slideModel
{
    /**
     * Return slide values from database
     * @param $table
     * @return array
     */

    public static function sqlShowSlide($table)
    {

        $stmt = Connection::connect()->prepare("SELECT * FROM $table");
        $stmt->execute();

        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

    }

}