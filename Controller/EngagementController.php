<?php
require('./Model/EngagementModel.php');

class EngagementController extends EngagementModel {
    public static function make_engagement($action) {
        header("Content-Type: application/json");
        
        // Ensure this endpoint is only accessible for logged-in users with a POST request
        if ($action == "like" && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["user_id"])) {
            $data = json_decode(file_get_contents("php://input"), true);
            $post_id = trim($data['post_id']);
            
            if (!empty($post_id)) {
                $engagementModel = new EngagementModel();
                
                // Insert like engagement and check for duplicates
                $likes = $engagementModel->insert_like_engagement($post_id, $_SESSION["user_id"]);
       
                if ($likes) {
                    echo json_encode(["status" => "success", "message" => "Engagement created"]);
                } else {
                    echo json_encode(["status" => "failed", "message" => "You have already liked this post"]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "Invalid post ID"]);
            }
        }else 
        if ($action == "pin" && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["user_id"])) {
            $data = json_decode(file_get_contents("php://input"), true);
            $post_id = trim($data['post_id']);
            
            if (!empty($post_id)) {
                $engagementModel = new EngagementModel();
        
                // Toggle the pin status and get the result
                $pinned = $engagementModel->insert_users_pinned_post($post_id, $_SESSION["user_id"]);
               
                if ($pinned) {
                    echo json_encode(["status" => "success", "message" => "Post pinned"]);
                } else {
                    echo json_encode(["status" => "success", "message" => "Post unpinned"]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "Invalid post ID"]);
            }
        }        
    }
    public static function get_engagement($action){
        header("Content-Type: application/json");
        // Ensure this endpoint is only accessible for logged-in users with a GET request
        if ($action == "like" && $_SERVER["REQUEST_METHOD"] == "GET" && isset($_SESSION["user_id"])){
            $engagementModel = new EngagementModel();
            $likes = $engagementModel->get_like_engagement();
            echo json_encode($likes);
        }
    }
}
