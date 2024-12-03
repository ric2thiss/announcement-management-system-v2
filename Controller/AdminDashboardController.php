<?php
require('./Model/UserModel.php');

class AdminDashboardController extends Users {
    public static function show() {
        Middleware::Authenticate();

        $userModel = new Users();
        $userData = $userModel->getUserById($_SESSION['user_id']);
        $allPosts = Users::getAllForAdminPosts();

       

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $currentImage = $_POST["currentImage"];
            // Check if a new file was uploaded
            if (!empty($_FILES["fileToUpload"]["tmp_name"])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        
                // Attempt to move the uploaded file
                if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "<script>alert('Something went wrong during file upload!');</script>";
                    return;
                }
                
                // If the file upload was successful, set $currentImage to the new file path
                $currentImage = $target_file;
            }
        
            // Update the post and handle success or failure
            if ($userModel->UpdatePost($currentImage)) {
                echo "<script>alert('Post updated successfully!');</script>";
                // Redirect after successful update
                echo "<script>window.location.href = './admin';</script>";
            } else {
                echo "<script>alert('Something went wrong while updating the post!');</script>";
                echo "<script>window.location.href = './admin';</script>";
            }
        }else{
            
            if(isset($_GET['id'])){
                if(Users::DeletePost()){
                    echo "<script>alert('Post deleted successfully!');</script>";
                    echo "<script>window.location.href = './admin';</script>";
                }else{
                    echo "<script>alert('Something went wrong while deleting the post!');</script>";
                    echo "<script>window.location.href = './admin';</script>";
                }
            }
        }


        
        

        // Check for the user's role
        if (strpos($userData["role_name"], "Admin") !== false) {
            $postModel = new Users(); 

            View::render('admin', [
                "user" => $userData,
                "userData" => $allPosts,
                "postCategories" => $postModel->getCategories(),
                "pinnedPosts" => $postModel->getPinnedPost(),
                "scheduledPosts" => $postModel->getScheduledpost(),
                "activePostNumber" => $postModel->activePostNumber(),
                "scheduledPostsNumber" => $postModel->scheduledPostsNumber()
            ]);

        } elseif ($userData["role_name"] == "Student") {
            
            View::render('error'); // Show an error if student view is not available

        } else {
            View::render('error', function() {
                echo "You are not authorized to access this page";
            });
        }
    }
}
