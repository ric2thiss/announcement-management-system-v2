<?php
require('./Model/UserModel.php');
use Twilio\Rest\Client;
class AnnouncementController extends Users{

    public static function post(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


            $post_title = $_POST["post_title"];
            $post_content = $_POST["post_content"];
            $post_when = $_POST["post_when"];
            // $user_id = $_POST["user_id"];
            $category_id = $_POST["category_id"];
            if(empty($post_title)||empty($post_content)||empty($post_when)||empty($category_id)){
                echo "Please fill in all fields.";
            }else if(!getimagesize($_FILES["fileToUpload"]["tmp_name"]) || $_FILES["fileToUpload"]["size"] > 1500000){
                echo "Please upload only image or too large";
            }else{
                $userModel = new Users();

                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

                if($userModel->createPost($post_title, $post_content, $post_when, $category_id, $target_file)){
                    Users::setPinnedPosts();

                    echo "Post created successfully.";
                    echo "<script>
                        setTimeout(() => {
                        window.location.href = './dashboard';
                        },1500);
                    </script>";

                    
                }else{
                    echo "Error creating post.";
                }
            }
        }else{
            echo "Invalid request method.";
        }
    }
}