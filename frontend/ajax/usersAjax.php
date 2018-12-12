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
    public $email;
    public $name;
    public $picture;

    public function ajaxValidateEmail()
    {
        $data = $this->validEmail;
        $item = "email";

        $response = usersController::ctrShowUsers($item, $data);

        echo json_encode($response, true);

    }

    public function ajaxUserFb()
    {

        $data = [
            'name' => $this->name,
            'password' => "null",
            'email' => $this->email,
            'mode' => 'facebook' ,
            'picture' => $this->picture,
            'verify' => 0,
            'emailcrypt' => 'null'
        ];

        $response = usersController::ctrLoginSocialNetworks($data);

        echo $response;

    }


}


if (isset($_POST['validateMail'])) {

    $validate = new usersAjax();
    $validate->validEmail = $_POST['validateMail'];
    $validate->ajaxValidateEmail();

}

/*FB REGISTER*/

if(isset($_POST['email'])){

    $fbReg = new usersAjax();
    $fbReg->email = $_POST['email'];
    $fbReg->name = $_POST['name'];
    $fbReg->picture = $_POST['picture'];

    $fbReg->ajaxUserFb();




}

