<?php
require('./Model/EngagementModel.php');

class EngagementController extends EngagementModel{
    public static function make_engagement($action){
        header("Content-Type: application/json");
        if($action == "like" && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["user_id"])){
            $data = json_decode(file_get_contents("php://input"), true);
            $post_id = trim($data['post_id']);
            
            if(!empty($post_id)){
                $engagementModel = new EngagementModel();
                $likes = $engagementModel->insert_like_engagement($post_id, $_SESSION["user_id"]);
                if($likes){
                    echo json_encode(array("status" => "success", "message" => "Engagement created"));
                }
            }
        // }else if($action == "like" && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["user_id"])){
        //     $engagementModel = new EngagementModel();
        //     $post_id = trim($_GET['post_id']);
        //     $likesData = $engagementModel->get_like_engagement($post_id);
        //     echo json_encode(["status"=>"success", "request_method"=>"GET", "data"=>$likesData]);
        }else{
            // echo json_encode(["status"=>"You are not authorized", "request_method"=>$_SERVER["REQUEST_METHOD"]]);
            echo json_encode(["status" => "endpoint reached"]); // Temporary chec
        }
    }
}