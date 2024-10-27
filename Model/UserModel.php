<?php
require('./Db.php');

class Users extends Database {

    public function AuthenticateUser($email, $password) {
        $conn = $this->Connect();
        $stmt = $conn->prepare("SELECT * FROM users_account WHERE email = :email");
        $stmt->execute(["email" => $email]);
        $user = $stmt->fetch(); 

 
        if ($user && password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["email"] = $user["email"];
            return true; 
        }

        return false; 
    }

    public function getUserById($userId) {
        $stmt = $this->Connect()->prepare("SELECT * FROM users_account WHERE id = :id");
        $stmt->execute(['id' => $userId]);
        return $stmt->fetch(); // Returns the user data as an associative array
    }
}
