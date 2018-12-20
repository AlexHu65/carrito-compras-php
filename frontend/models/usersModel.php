<?php

require_once 'connection.php';


class usersModel
{

    static function sqlRegisterUser($table, $data)
    {

        /*User register*/
        $stmt = connection::connect()->prepare("INSERT $table (nombre, password, email,modo, foto , verificacion, emailEncriptado) VALUES (:nombre, :password, :email, :modo, :foto , :verificacion, :cryptmail)");

        $stmt->bindParam(":nombre", $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data['password'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(":modo", $data['mode'], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $data['picture'], PDO::PARAM_STR);
        $stmt->bindParam(":verificacion", $data['verify'], PDO::PARAM_INT);
        $stmt->bindParam(":cryptmail", $data['emailcrypt'], PDO::PARAM_INT);

        return $stmt->execute();


        $stmt->close();
        $stmt = null;
    }

    static function sqlShowUsers($table, $item, $value)
    {


        $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt = null;

    }

    static function sqlShowPurchases($table, $item, $value)
    {

        $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;

    }

    static function sqlSingleUpdateUsers($table, $id, $item, $value)
    {


        $stmt = connection::connect()->prepare("UPDATE $table SET $item = :$item WHERE id = :id");

        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';

        }

        $stmt->close();

        $stmt = null;


    }

    static function sqlUpdateUserData($table, $data)
    {

        $stmt = connection::connect()->prepare("UPDATE $table SET nombre = :username, password = :pass , neighborhood = :neighborhood , street = :street, tel1 = :tel1 , tel2 = :tel2, referencesDirection = :referencesDirection, zip = :zip WHERE  id = :id");


        $stmt->bindParam(":username", $data['edit-name'], PDO::PARAM_STR);
        $stmt->bindParam(":pass", $data['edit-pass'], PDO::PARAM_STR);
        $stmt->bindParam(":neighborhood", $data['edit-colonia'], PDO::PARAM_STR);
        $stmt->bindParam(":street", $data['edit-direction'], PDO::PARAM_STR);
        $stmt->bindParam(":tel1", $data['edit-tel'], PDO::PARAM_STR);
        $stmt->bindParam(":tel2", $data['edit-tel2'], PDO::PARAM_STR);
        $stmt->bindParam(":referencesDirection", $data['edit-references'], PDO::PARAM_STR);
        $stmt->bindParam(":zip", $data['edit-zip'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $data['id_user'], PDO::PARAM_STR);


        if ($stmt->execute()) {

            $stmt = null;
            return 'ok';

        } else {

            $stmt = null;
            return 'error';
        }

    }

    public static function sqlShowComments($table, $data)
    {
        if ($data["idUser"] != "") {

            $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE id_usuario = :id_user AND id_producto = :id_product");

            $stmt->bindParam(":id_user", $data["idUser"], PDO::PARAM_INT);
            $stmt->bindParam(":id_product", $data["idProduct"], PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE id_producto = :id_producto ORDER BY Rand()");
            $stmt->bindParam(":id_producto", $data["idProduct"], PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;
    }


}