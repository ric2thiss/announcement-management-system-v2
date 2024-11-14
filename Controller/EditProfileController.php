<?php

require('./Model/UserModel.php');

class EditProfileController extends Users{
    public static function show(){
        Middleware::Authenticate();
        $userModel = new Users();
        $userData = $userModel->getUserById($_SESSION['user_id']);

        View::render('edit-profile', ["userData"=>$userData]);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["profile"]["name"]);
            if(move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)){
                if(!$userModel->UpdateUser($target_file)){
                    echo "<script>alert('Something went wrong!')</script>";
                }else{
                    echo "<script>
                    alert('Updated Successfully!')
                    window.location.href = './edit-profile'
                    </script>";
                }
            }else{
                echo "<script>alert('Something went wrong during uploading file!')</script>";
            }
        }

    }
}