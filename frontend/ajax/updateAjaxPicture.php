<?php


require_once "../controllers/usersController.php";
require_once "../models/usersModel.php";

class updateAjaxPicture
{

    public $data;


    public function ajaxUpdateProfilePic()
    {

        error_reporting(0);
        session_start();
        $data = $this->data;

        if (isset($data['user'])) {

            $user = $data['user'];
            $item = 'id';
            $value = $user;
            $dataUser = usersController::ctrShowUsers($item, $value, '');

            if (isset($dataUser['foto']) && $dataUser['foto'] == $data['uploadedFile']['file']['name']) {

                echo 'error';

            } else {


                /* Getting file name */
                $random = mt_rand(100, 999);

                /* Location */

                $directory = "../views/img/users/" . $data['user'] . "/";
                $location = "../views/img/users/" . $data['user'] . "/" . $random . ".jpg";


                if (file_exists($directory)) {

                    unlink($directory . $_SESSION['user']['picture']);

                } else {

                    mkdir($directory, 0755);

                }


                $uploadOk = 1;
                $imageFileType = pathinfo($location, PATHINFO_EXTENSION);

                /* Valid Extensions */

                $valid_extensions = array("jpg", "jpeg", "png");

                /* Check file extension */
                if (!in_array(strtolower($imageFileType), $valid_extensions)) {

                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {

                    echo 'error';

                } else {


                    /*Resize img */
                    $sourceimg = getimagesize($data['uploadedFile']['file']['tmp_name']);
                    $imgType = $sourceimg[2];
                    $ext = pathinfo($data['uploadedFile']['file']['name'], PATHINFO_EXTENSION);
                    $file = $data['uploadedFile']['file']['tmp_name'];
                    $folderPath = $directory;
                    $fileNewName = $random;

                    switch ($imgType) {


                        case IMAGETYPE_PNG:

                            $imageResourceId = imagecreatefrompng($file);
                            $targetLayer = imageResize($imageResourceId, $sourceimg[0], $sourceimg[1]);

                            if (imagepng($targetLayer, $folderPath . $fileNewName . "_thump." . $ext)) {

                                $item = 'foto';
                                $value = $fileNewName . "_thump." . $ext;

                                $response = usersController::ctrUpdateUsers($data['user'], $item, $value);

                                if ($response == 'ok') {
                                    error_reporting(0);
                                    session_start();
                                    $_SESSION["user"]["picture"] = $fileNewName . "_thump." . $ext;
                                    echo 'ok';

                                } else {

                                    echo 'error';
                                }

                            } else {
                                echo 'error';
                            }


                            break;

                            case IMAGETYPE_JPEG:

                            $imageResourceId = imagecreatefromjpeg($file);
                            $targetLayer = imageResize($imageResourceId, $sourceimg[0], $sourceimg[1]);

                            if (imagejpeg($targetLayer, $folderPath . $fileNewName . "_thump." . $ext)) {

                                $item = 'foto';
                                $value = $fileNewName . "_thump." . $ext;

                                $response = usersController::ctrUpdateUsers($data['user'], $item, $value);

                                if ($response == 'ok') {
                                    error_reporting(0);
                                    session_start();
                                    $_SESSION["user"]["picture"] = $fileNewName . "_thump." . $ext;
                                    echo 'ok';

                                } else {

                                    echo 'error';
                                }

                            } else {
                                echo 'error';
                            }


                            break;
                    }
                }
            }


        }

    }


}


function imageResize($imageResourceId, $width, $height)
{
    $targetWidth = 500;
    $targetHeight = 500;
    $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

    return $targetLayer;
}


if (isset($_FILES['file']['name']) && isset($_POST['user'])) {

    $file = new updateAjaxPicture();
    $file->data = ['uploadedFile' => $_FILES, 'user' => $_POST['user']];
    $file->ajaxUpdateProfilePic();


}

