<?php


require_once './config/database.php';

class connection
{
    public static function connect()
    {
        $conn = new database();
        return $conn->getConnection();
    }

}