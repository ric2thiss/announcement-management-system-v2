<?php
require('./Model/UserModel.php');

class UsersController extends Users{
    public static function find($id){
        echo "Requested ID: " . $id . "<br>";
        $user = Users::find($id);

        View::render("profile", ["users"=>$user]);
       
    }
}