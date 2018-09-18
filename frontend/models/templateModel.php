<?php

require_once 'connection.php';

class templateModel
{


    static public function mdlStyleTemplate($table)
    {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;

    }

}