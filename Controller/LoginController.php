<?php
require('./Model/UserModel.php');
class LoginController{

    public static function login(){ 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST["email"];
            $password = $_POST["password"];

            if(empty($email) || empty($password)){
                echo "<script>alert('Email and Password must not empty!')</script>";
            }else{
                $userModel = new Users();

                if($userModel->AuthenticateUser($email, $password)){
                    echo "<script>alert('Login Success')</script>";
                    header("Location: ./dashboard");
                }else{
                    $_SESSION["error"] = "Invalid Email or Password";
                    header("Location: ./login");

                }
            }  
        }else{
            Middleware::isLoggedIn();   
            View::render('login');

        }
    }
}