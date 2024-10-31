<?php
require('./Model/UserModel.php');

class UsersController extends Users{
    public static function find($id){
        // echo "Requested ID: " . $id . "<br>";
        $user = Users::find($id);
        if($user["user_id"] === $_SESSION["user_id"]){
            header("Location: ../dashboard");
        }

        View::render("profile", ["users"=>$user]);
       
    }

    public static function open_pinned_post($id) {
        // Get the pinned post data
        $pinned_posts = Users::getPinnedPostPage($id);
    
        // Render the view, passing the pinned posts data
        View::render("posts", ["pinned_posts" => $pinned_posts]);
    }
    
}