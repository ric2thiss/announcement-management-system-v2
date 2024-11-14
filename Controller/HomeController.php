
<?php

require('./Model/UserModel.php');

class HomeController extends Users{
    public static function show(){
        Middleware::Authenticate();
        $postModel = new Users();
        View::render("home", ["posts" => Users::getAllPosts(),
                              "postCategories"=>$postModel->getCategories(),
                              "pinnedPosts"=>$postModel->getPinnedPost(),
                              "userData"=>$postModel->getUserById($_SESSION['user_id']),
                            ]);
    }
}