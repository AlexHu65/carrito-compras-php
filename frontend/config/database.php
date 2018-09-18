<?php

/**
 * Created by PhpStorm.
 * User: alejandro.chavez
 * Date: 9/17/2018
 * Time: 6:01 PM
 */
class database
{

    private $host = 'localhost';

    private $username = 'root';

    private $password = '';

    private $db_name = 'ecommerce';

    private $conn = '';

    public function getConnection()
    {

        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );

        } catch (PDOException $exception) {

            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;


    }

}