<?php
require('./Model/UserModel.php');
class LoginController{

    public static function login(){ 
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $idnumber = $_POST["idnumber"];
            $firstname = $_POST["firstname"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            




            // // Check if the idnumber or email already exists in the database
            // $query = "SELECT idnumber, email FROM users_account
            // WHERE idnumber = :idnumber OR email = :email";
            // $stmt = $conn->prepare($query);
            // $stmt->bindParam(':idnumber', $this->idnumber);
            // $stmt->bindParam(':email', $this->email);
            // $stmt->execute();

            // // If a record exists, return a message that the user ID or email already exists
            // if ($stmt->rowCount() > 0) {
            //     echo "User ID or Email already exists.";
            // } else {
            //     // If no existing record, proceed to insert the new user
            //     $sql = "INSERT INTO users_account (idnumber, firstname, lastname, middleinitial, contactnumber,
            //     email, purok, barangay, zip, city, password)
            //     VALUES (:idnumber, :firstname, :lastname, :middleinitial, :contactnumber,
            //     :email, :purok, :barangay, :zip, :city, :password)";
                
            //     try {
            //         $stmt = $conn->prepare($sql);
            //         $stmt->bindParam(':idnumber', $this->idnumber);
            //         $stmt->bindParam(':firstname', $this->firstname);
            //         $stmt->bindParam(':lastname', $this->lastname);
            //         $stmt->bindParam(':middleinitial', $this->middleinitial);
            //         $stmt->bindParam(':contactnumber', $this->contactnumber);
            //         $stmt->bindParam(':email', $this->email);
            //         $stmt->bindParam(':purok', $this->purok);
            //         $stmt->bindParam(':barangay', $this->barangay);
            //         $stmt->bindParam(':zip', $this->zip);
            //         $stmt->bindParam(':city', $this->city);
            //         $stmt->bindParam(':password', $this->password); // Use the hashed password
            //         $stmt->execute();

            //         echo "Account created successfully!";
            //     } catch (PDOException $e) {
            //         echo "Error: " . $e->getMessage();
            //     }
            // }
        }else {
            // require_once("./Controller/Middleware.php");
            // Middleware::Authenticate();
            View::render('register');
        }
    }
}