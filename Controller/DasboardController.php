<?php
require('./Model/UserModel.php');
class DashboardController extends Users{
    public static function show() {
        Middleware::Authenticate();
         
        $userModel = new Users();
        $userData = $userModel->getUserById($_SESSION['user_id']);
         
        // Render the view with the data
        View::render('dashboard', $userData);
    }
}
