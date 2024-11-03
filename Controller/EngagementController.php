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
        } else {
            echo json_encode(["status" => "error", "message" => "Unauthorized access or invalid request method"]);
        }
    }
}
