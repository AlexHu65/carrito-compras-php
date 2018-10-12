<?php

class connection
{

    public static function connect()
    {

        $link = null;

        try {
            //Create connection DB
            $link = new PDO('mysql:host=localhost;dbname=ecommerce',
                'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );

        } catch (PDOException $exception) {

            return "Connection error: " . $exception->getMessage();

        }

        return $link;

    }

}