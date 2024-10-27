<?php
require('./Model/UserModel.php');
class RegisterController{

    public static function register(){ 
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $idnumber = htmlspecialchars($_POST["idnumber"]);
            $firstname = htmlspecialchars($_POST["firstname"]);
            $lastname = htmlspecialchars($_POST["lastname"]);
            $middleinitial = htmlspecialchars($_POST["middleinitial"]);
            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            $password = htmlspecialchars($_POST["password"]); 
            $program = htmlspecialchars($_POST["program"]);
            $department = htmlspecialchars($_POST["department"]);
            $contactnumber = htmlspecialchars($_POST["contactnumber"]);
            $purok = htmlspecialchars($_POST["purok"]);
            $barangay = htmlspecialchars($_POST["barangay"]);
            $city = htmlspecialchars($_POST["city"]);
            $province = htmlspecialchars($_POST["province"]);
            $zip = htmlspecialchars($_POST["zip"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format.";
            }
            if(empty($idnumber)||empty($firstname)||empty($lastname)||empty($email)||empty($password)||empty($program)||empty($department)||empty($middleinitial)||empty($contactnumber)||empty($purok)||empty($barangay)||empty($city)||empty($province)||empty($zip)){
                echo "<script>alert('Please fill up all the required fields.');</script>";
            }

            $userModel = new Users();
            
            if($userModel->CreateUser($idnumber, $firstname, $lastname,$middleinitial, $email, $password, $program, $department, $contactnumber, $purok, $barangay, $city, $province, $zip)){
                echo "<script>alert('Registration successful.');</script>";
                echo "<script>window.location.href='./login';</script>";
                // header("Location: ./login");
            }else{
                echo "<script>alert('Registration failed. Email or ID is already existed in the database');</script>";
            }

        }else {
            // require_once("./Controller/Middleware.php");
            // Middleware::Authenticate();
            View::render('register');
        }
    }
}