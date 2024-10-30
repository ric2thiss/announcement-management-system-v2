<?php
require('./Model/UserModel.php');
class DashboardController extends Users{
    public static function show() {
        Middleware::Authenticate();
         
        $userModel = new Users();
        $userData = $userModel->getUserById($_SESSION['user_id']);
    
        $postModel = new Users(); 
        $postCategories = $postModel->getInitialDataPost();
        $pinnedPosts = $postModel->getPinnedPost();
        $scheduledPosts = $postModel->getpost();

        if($userData["role_name"] !== 'STUDENT'){
            View::render('dashboard', ["userData"=>$userData, "postCategories"=>$postCategories, "pinnedPosts"=>$pinnedPosts, "scheduledPosts"=>$scheduledPosts]);
        }else if($userData["role_name"] == "STUDENT"){
            View::render('student', $userData);
        }else{
            View::render('error');
        }

         // if($userData["role_id"] == 4){
         //    View::render('student', $userData);
         // }else if($userData["role_id"] < 4){
         //    View::render('dashboard', ["userData"=>$userData, "postCategories"=>$postCategories, "pinnedPosts"=>$pinnedPosts, "scheduledPosts"=>$scheduledPosts]);
         // }else{
         //    View::render('error');
         // }

    }
}
