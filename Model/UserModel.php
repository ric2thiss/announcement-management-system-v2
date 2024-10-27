<?php
require('./Db.php');

class Users extends Database {
    public function CreateUser($idnumber, $firstname, $lastname,$middleinitial, $email, $password, $program, $department, $contactnumber, $purok, $barangay, $city, $province, $zip){
        $conn = $this->Connect();
        $query = "SELECT idnumber, email FROM  users_account WHERE idnumber = :idnumber OR email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':idnumber', $idnumber);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return false;
        }else{
            // hash the password 
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users_account(idnumber, firstname, lastname, middleinitial, email, password, program, department, contactnumber, purok, barangay, city, province, zip)
                      VALUES(:idnumber, :firstname, :lastname, :middleinitial, :email, :password, :program, :department, :contactnumber, :purok, :barangay, :city, :province, :zip)";

                      

            $stmt = $this->Connect()->prepare($query);
            $stmt->bindParam(":idnumber",$idnumber);
            $stmt->bindParam(":firstname",$firstname);
            $stmt->bindParam(":lastname",$lastname);
            $stmt->bindParam(":middleinitial",$middleinitial);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":password", $hashed_password);
            $stmt->bindParam(":program",$program);
            $stmt->bindParam(":department",$department);
            $stmt->bindParam(":contactnumber",$contactnumber);
            $stmt->bindParam(":purok", $purok);
            $stmt->bindParam(":barangay",$barangay);
            $stmt->bindParam(":city",$city);
            $stmt->bindParam(":province",$province);
            $stmt->bindParam(":zip",$zip);
            $stmt->execute();
            return true;
        }
        
    }
    public function AuthenticateUser($email, $password) {
        $conn = $this->Connect();
        $stmt = $conn->prepare("SELECT * FROM users_account WHERE email = :email");
        $stmt->execute(["email" => $email]);
        $user = $stmt->fetch(); 

 
        if ($user && password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["email"] = $user["email"];
            if($user["role"] == "admin"){
                $_SESSION["role"] = "admin";
            }else if($user["role"] == "student"){
                $_SESSION["role"] = "student";
            }
            return true; 
        }

        return false; 
    }

    public function getUserById($userId) {
        $stmt = $this->Connect()->prepare("SELECT *,DATE(created) AS date_only,           
        TIME_FORMAT(created, '%h:%i:%s %p') AS time_only,  
        MONTHNAME(created) AS month_name   FROM users_account WHERE id = :id");
        $stmt->execute(['id' => $userId]);
        return $stmt->fetch(); // Returns the user data as an associative array
    }

    function createPost($post_what, $post_who, $post_where, $post_when, $post_content){
        $conn = $this->Connect();

        $query = "INSERT INTO posts(post_what, post_who, post_where, post_when, post_content, id) 
                VALUES(:post_what, :post_who, :post_where, :post_when, :post_content, :id)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':post_what', $post_what);
        $stmt->bindParam(':post_who', $post_who);
        $stmt->bindParam(':post_where', $post_where);
        $stmt->bindParam(':post_when', $post_when);
        $stmt->bindParam(':post_content', $post_content);
        $stmt->bindParam(':id', $_SESSION["user_id"]);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
        // if($result){
        //     echo json_encode(["message" => "Created a post successfully", "status"=>"success"]);
        // }else{
        //     echo json_encode(["message" => "Failed to create a post", "status"=>"error"]);
        // }

    }


}
