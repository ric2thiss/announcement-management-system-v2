
<?php

require('./Model/UserModel.php');

class HomeController extends Users{
    public static function show(){
        Middleware::Authenticate();
        $postModel = new Users();
        View::render("home", ["posts" => Users::getAllPosts(),
                              "postCategories"=>$postModel->getCategories(),
                              "pinnedPosts"=>$postModel->getPinnedPost(),
                            //   "get_users_pinned_posts"=>$postModel->get_users_pinned_posts($_SESSION["user_id"])
                            ]);
    }
}