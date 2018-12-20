<?php
/**
 * Created by PhpStorm.
 * User: alejandro.chavez
 * Date: 12/11/2018
 * Time: 9:41 AM
 */


require_once "../controllers/usersController.php";
require_once "../models/usersModel.php";

class usersAjax
{

    public $validEmail;

    public $id;

    public $email;

    public $name;

    public $picture;

    public $data;

    /**
     * Validate email on register form
     */


    public function ajaxValidateEmail()
    {
        $data = $this->validEmail;
        $item = "email";

        $response = usersController::ctrShowUsers($item, $data);

        echo json_encode($response, true);

    }

    /**
     * Get login social network Facebook
     */

    public function ajaxUserFb()
    {

        $data = [
            'name' => $this->name,
            'password' => "null",
            'email' => $this->email,
            'mode' => 'facebook',
            'picture' => $this->picture,
            'verify' => 0,
            'emailcrypt' => 'null'
        ];

        $response = usersController::ctrLoginSocialNetworks($data);

        echo $response;

    }

    /**
     * Update user info Ajax
     */


    public function ajaxUserUpdate()
    {

        $data = $this->data;
        $item = 'id';
        $value = $data['id_user'];

        $user = usersController::ctrShowUsers($item, $value);


        //If user exits on the database
        if (!empty($user)) {

            if ($user['modo'] == 'direct') {
                $newPass = '';

                if ($data['edit-pass'] !== '') {
                    $newPass = crypt($data['edit-pass'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                }

                if ($newPass !== '') {
                    $data['edit-pass'] = $newPass;

                } else {
                    $data['edit-pass'] = $data['pass'];
                }
            } else {
                $data['edit-pass'] = 'null';
            }


            $updateUser = usersController::ctrUpdateUserData($data);

            if ($updateUser == 'ok') {

                session_start();
                $_SESSION['user']['nombre'] = $data['edit-name'];
                $_SESSION['user']['pass'] = $data['edit-pass'];

                echo 'ok';


            } else {

                echo 'error';
            }
        }


    }

    /**
     * Get user contact data
     * @param $data
     */

    public function ajaxGetUser($data)
    {

        $item = 'id';
        $value = $data;

        $dataUserContact = usersController::ctrShowUsers($item, $value);

        if (!empty($dataUserContact)) {

            echo json_encode($dataUserContact, true);
        }

    }

}

if (isset($_POST['validateMail'])) {

    $validate = new usersAjax();
    $validate->validEmail = $_POST['validateMail'];
    $validate->ajaxValidateEmail();

}

/*FB REGISTER*/

if (isset($_POST['email'])) {

    $fbReg = new usersAjax();
    $fbReg->email = $_POST['email'];
    $fbReg->name = $_POST['name'];
    $fbReg->picture = $_POST['picture'];

    $fbReg->ajaxUserFb();


}


if (isset($_POST['idUser'])) {

    $userContact = new usersAjax();
    $userContact->ajaxGetUser($_POST['idUser']);

}

if (isset($_POST['id_user'])) {


    $userData = new usersAjax();
    $userData->data = $_POST;
    $userData->ajaxUserUpdate();


}






