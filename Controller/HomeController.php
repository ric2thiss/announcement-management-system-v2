
<?php

require('./Model/UserModel.php');

class HomeController extends Users{
    public static function show(){
        Middleware::Authenticate();
        
        View::render("home", ["posts" => Users::getAllPosts()]);
    }
}