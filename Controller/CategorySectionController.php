<?php

require('./Model/UserModel.php');
class Category extends Users{
    public static function create(){
        if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["create_category"])){
            $category_name = trim($_POST["category_name"]);

            if(empty($category_name)){
                echo "Category name is required";
                echo "<script>
                        setTimeout(() => {
                        window.location.href = './dashboard';
                        },1500);
                    </script>";
            }else{
                $userModel = new Users();
                if($userModel->createCategory()){
                    echo "Category created successfully";
                    echo "<script>
                        setTimeout(() => {
                        window.location.href = './dashboard';
                        },1500);
                    </script>";
                }
            }
        } 
    }

}