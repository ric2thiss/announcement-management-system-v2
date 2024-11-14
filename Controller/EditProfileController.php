<?php

require('./Model/UserModel.php');

class EditProfileController extends Users {
    public static function show() {
        Middleware::Authenticate();
        $userModel = new Users();
        $userData = $userModel->getUserById($_SESSION['user_id']);

        View::render('edit-profile', ["userData" => $userData]);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $target_file = $userData['photo']; 

            if (!empty($_FILES["profile"]["tmp_name"])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["profile"]["name"]);

                if (!move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
                    echo "<script>alert('Something went wrong during file upload!');</script>";
                    return;
                }
            }

            if (!$userModel->UpdateUser($target_file)) {
                echo "<script>alert('Something went wrong while updating the user!');</script>";
            } else {
                echo "<script>
                    window.location.href = './edit-profile';
                </script>";
            }
        }
    }
}
