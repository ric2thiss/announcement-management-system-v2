<?php
require('./Model/UserModel.php');
class AnnouncementController extends Users{

    public static function post(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $post_what = $_POST["post_what"];
            $post_who = $_POST["post_who"];
            $post_where = $_POST["post_where"];
            $post_when = $_POST["post_when"];
            $post_content = $_POST["post_content"];
            if(empty($post_what)||empty($post_who)||empty($post_where)||empty($post_when)||empty($post_content)){
                echo "Please fill in all fields.";
            }else{
                $userModel = new Users();

                if($userModel->createPost($post_what, $post_who, $post_where, $post_when, $post_content)){
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