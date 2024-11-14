<?php
require('./Model/UserModel.php');

class AdminDashboardController extends Users {
    public static function show() {
        Middleware::Authenticate();

        $userModel = new Users();
        $userData = $userModel->getUserById($_SESSION['user_id']);

        if(isset($_GET["update"]) && $_SERVER["REQUEST_METHOD"] == "GET"){
            
        }

        // Check for the user's role
        if (strpos($userData["role_name"], "Admin") !== false) {
            $postModel = new Users(); 

            View::render('admin', [
                "userData" => Users::getAllPosts(),
                "postCategories" => $postModel->getCategories(),
                "pinnedPosts" => $postModel->getPinnedPost(),
                "scheduledPosts" => $postModel->getScheduledpost(),
                "activePostNumber" => $postModel->activePostNumber(),
                "scheduledPostsNumber" => $postModel->scheduledPostsNumber()
            ]);

        } elseif ($userData["role_name"] == "Student") {
            // Uncomment if there’s a student-specific view
            // View::render('student', [
            //     "userData" => $userData,
            //     "postCategories" => $postModel->getCategories(),
            //     "get_users_pinned_posts" => $postModel->get_users_pinned_posts($_SESSION["user_id"])
            // ]);
            View::render('error'); // Show an error if student view is not available

        } else {
            View::render('error', function() {
                echo "You are not authorized to access this page";
            });
        }
    }
}
