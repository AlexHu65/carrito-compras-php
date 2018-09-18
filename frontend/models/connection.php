<?php


require_once './config/db.php';

class connection
{
    public static function connect()
    {
        $conn = new db();
        return $conn->getConnection();
    }

}