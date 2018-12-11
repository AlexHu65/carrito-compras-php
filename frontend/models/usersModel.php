<?php

require_once 'connection.php';


class usersModel
{

    static function sqlRegisterUser($table, $data)
    {

        /*User register*/
        $stmt = connection::connect()->prepare("INSERT $table (nombre, password, email, modo, verificacion, emailEncriptado) VALUES (:nombre, :password, :email, :modo, :verificacion, :cryptmail)");

        $stmt->bindParam(":nombre", $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data['password'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(":modo", $data['mode'], PDO::PARAM_STR);
        $stmt->bindParam(":verificacion", $data['verify'], PDO::PARAM_INT);
        $stmt->bindParam(":cryptmail", $data['emailcrypt'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;

        } else {
            return false;
        }


        $stmt->close();
        $stmt = null;
    }

    static function sqlShowUsers($table, $item , $value)
    {

        $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt->bindParam(":" . $item , $value , PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt = null;

    }

    static function sqlMailUpdateUsers($table, $id, $item, $value){


        $stmt = connection::connect()->prepare("UPDATE $table SET $item = :$item WHERE id = :id");

        $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
        $stmt -> bindParam(":id", $id, PDO::PARAM_INT);

        if($stmt -> execute()){

            return true;

        }else{

            return false;

        }

        $stmt-> close();

        $stmt = null;


    }


}