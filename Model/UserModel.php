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
                      VALUES(idnumber =:idnumber, firstname =:firstname, lastname =:lastname, middleinitial= :middleinitial, email= :email, password= :password, program= :program, department= :department,
                      contactnumber= :contactnumber, purok= :purok, barangay= :barangay, city= :city, province= :province, zip= :zip)";

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
}
