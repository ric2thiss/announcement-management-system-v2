<?php

class Middleware{

    public static function Authenticate(){
        // session_start();
        if(!isset($_SESSION['user_id'])){
            header('Location: ./login');
            exit;
        }
    }
}