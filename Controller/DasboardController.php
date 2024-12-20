<?php
require('./Model/UserModel.php');
class DashboardController extends Users{
    public static function show() {
        Middleware::Authenticate();
         
        $userModel = new Users();
        $userData = $userModel->getUserById($_SESSION['user_id']);
    
        $postModel = new Users(); 

        if($userData["role_name"] !== 'Student'){
            View::render('dashboard', 
            ["userData"=>$userData, "postCategories"=>$postModel->getCategories(), 
            "pinnedPosts"=>$postModel->getPinnedPost(), 
            "scheduledPosts"=>$postModel->getScheduledpost(),
            "activePostNumber"=>$postModel->activePostNumber(),
            "scheduledPostsNumber"=>$postModel->scheduledPostsNumber(),
            "getCategories" => $postModel->getCategories()
            ]);
        }else if($userData["role_name"] == "Student"){
            View::render('student', ["userData"=> $userData,
                                    "postCategories"=>$postModel->getCategories(),
                                    "get_users_pinned_posts"=>$postModel->get_users_pinned_posts($_SESSION["user_id"]),
                                    ]);
        }else{
            View::render('error',function(){
                echo "You are not authorized to access this page";
            });
        }

    }
}
