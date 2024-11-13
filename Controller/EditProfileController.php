<?php

require('./Model/UserModel.php');

class EditProfileController extends Users{
    public static function show(){
        Middleware::Authenticate();
        $userModel = new Users();
        $userData = $userModel->getUserById($_SESSION['user_id']);

        View::render('edit-profile', ["userData"=>$userData]);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!$userModel->UpdateUser()){
                echo "<script>alert('Something went wrong!')</script>";
            }else{
                // alert('Updated Successfully!')
                echo "<script>

                window.location.href = './edit-profile'
                </script>";
            }
        }

    }
}