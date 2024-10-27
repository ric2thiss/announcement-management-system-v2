<?php
require('./Model/UserModel.php');
class LoginController{

    public static function login(){ 
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $email = $_POST["email"];
            $password = $_POST["password"];

            if(empty($email) || empty($password)){
                echo "<script>alert('Email and Password must not empty!')</script>";
            }else{
                // Instantiate the model and pass the data to the model
                $userModel = new Users();

                if($userModel->AuthenticateUser($email, $password)){
                    // View::render('login');
                    echo "<script>alert('Login Success')</script>";
                    header("Location: ./dashboard");
                }else{
                    echo "<script>alert('Invalid Email or Password')</script>";
                    header("Location: ./login");
                }
            }  
        }else {
            // require_once("./Controller/Middleware.php");
            // Middleware::Authenticate();
            View::render('login');
        }
    }
}