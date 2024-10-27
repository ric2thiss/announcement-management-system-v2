<?php
require('./Model/UserModel.php');
class DashboardController extends Users{
    public static function show() {
        Middleware::Authenticate();
         
        $userModel = new Users();
        $userData = $userModel->getUserById($_SESSION['user_id']);
         if($userData["role"] == "student"){
            View::render('student', $userData);
         }else if($userData["role"] == "admin"){
            View::render('dashboard', $userData);
         }else{
            View::render('error');
         }

    }
}
