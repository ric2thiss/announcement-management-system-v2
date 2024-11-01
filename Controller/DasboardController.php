<?php
require('./Model/UserModel.php');
class DashboardController extends Users{
    public static function show() {
        Middleware::Authenticate();
         
        $userModel = new Users();
        $userData = $userModel->getUserById($_SESSION['user_id']);
    
        $postModel = new Users(); 

        if($userData["role_name"] !== 'STUDENT'){
            View::render('dashboard', 
            ["userData"=>$userData, "postCategories"=>$postModel->getCategories(), 
            "pinnedPosts"=>$postModel->getPinnedPost(), 
            "scheduledPosts"=>$postModel->getScheduledpost(),
            "activePostNumber"=>$postModel->activePostNumber(),
            "scheduledPostsNumber"=>$postModel->scheduledPostsNumber(),
            "getCategories" => $postModel->getCategories()
            ]);
        }else if($userData["role_name"] == "STUDENT"){
            View::render('student', $userData);
        }else{
            View::render('error');
        }

    }
}
