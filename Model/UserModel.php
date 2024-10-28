<?php
require('./Db.php');

class Users extends Database {
    public function getpost(){
        $conn = $this->Connect();
        $stmt = $conn->prepare("SELECT p.*,  DATE_FORMAT(sp.schedule_date, '%d, %Y') AS date_only, MONTHNAME(sp.schedule_date) AS month_name
                                FROM scheduled_posts sp
                                INNER JOIN posts p ON sp.post_id = p.post_id
                                ORDER BY month_name DESC
                                ;
                                ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPinnedPost() {
        $conn = $this->Connect();
    
        $stmt = $conn->prepare("SELECT p.*, u.first_name, u.last_name
                                FROM posts p
                                INNER JOIN scheduled_posts sp ON p.post_id = sp.post_id
                                INNER JOIN users u ON p.user_id = u.user_id
                                WHERE NOW() BETWEEN DATE_SUB(sp.schedule_date, INTERVAL 1 DAY) AND sp.schedule_date;
                                ");
    
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch all matching rows as an associative array
        
        return $result; // Return the retrieved posts
    }    

    public function getInitialDataPost() {
        $conn = $this->Connect(); // Ensure this method properly establishes a database connection
        $stmt = $conn->prepare("SELECT category_name, category_id FROM categories");
        $stmt->execute();
        
        // Fetch all results as an associative array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $result;
    }
    

    public function getInitialData(){
        // begin transaction
        $conn = $this->Connect();
        $conn->beginTransaction();

        // Query to fetch roles
        $stmtRoles = $conn->prepare("SELECT role_name, role_id FROM roles");
        $stmtRoles->execute();
        $roles = $stmtRoles->fetchAll(PDO::FETCH_ASSOC);

        // Query to fetch programs
        $stmtPrograms = $conn->prepare("SELECT program_name, program_id FROM programs");
        $stmtPrograms->execute();
        $programs = $stmtPrograms->fetchAll(PDO::FETCH_ASSOC);

        // Query to fetch departments
        $stmtDepartments = $conn->prepare("SELECT department_name, department_id FROM departments");
        $stmtDepartments->execute();
        $departments = $stmtDepartments->fetchAll(PDO::FETCH_ASSOC);

        // Commit the transaction
        $conn->commit();

        // Return all the data as an associative array
        return [
            'roles' => $roles,
            'programs' => $programs,
            'departments' => $departments
        ];
    }


    // public function CreateUser($idnumber, $firstname, $lastname,$middleinitial, $email, $password, $program, $department, $contactnumber, $purok, $barangay, $city, $province, $zip){
    //     $conn = $this->Connect();
    //     $query = "SELECT idnumber, email FROM  users_account WHERE idnumber = :idnumber OR email = :email";
    //     $stmt = $conn->prepare($query);
    //     $stmt->bindParam(':idnumber', $idnumber);
    //     $stmt->bindParam(':email', $email);
    //     $stmt->execute();

    //     if($stmt->rowCount() > 0){
    //         return false;
    //     }else{
    //         // hash the password 
    //         $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    //         $query = "INSERT INTO users_account(idnumber, firstname, lastname, middleinitial, email, password, program, department, contactnumber, purok, barangay, city, province, zip)
    //                   VALUES(:idnumber, :firstname, :lastname, :middleinitial, :email, :password, :program, :department, :contactnumber, :purok, :barangay, :city, :province, :zip)";

                      

    //         $stmt = $this->Connect()->prepare($query);
    //         $stmt->bindParam(":idnumber",$idnumber);
    //         $stmt->bindParam(":firstname",$firstname);
    //         $stmt->bindParam(":lastname",$lastname);
    //         $stmt->bindParam(":middleinitial",$middleinitial);
    //         $stmt->bindParam(":email",$email);
    //         $stmt->bindParam(":password", $hashed_password);
    //         $stmt->bindParam(":program",$program);
    //         $stmt->bindParam(":department",$department);
    //         $stmt->bindParam(":contactnumber",$contactnumber);
    //         $stmt->bindParam(":purok", $purok);
    //         $stmt->bindParam(":barangay",$barangay);
    //         $stmt->bindParam(":city",$city);
    //         $stmt->bindParam(":province",$province);
    //         $stmt->bindParam(":zip",$zip);
    //         $stmt->execute();
    //         return true;
    //     }
        
    // }
    public function CreateUser(
        $id_number,
        $first_name,
        $last_name,
        $middle_initial,
        $email,
        $password,
        $program_id,
        $department_id,
        $contact_number,
        $address_purok,
        $address_barangay,
        $address_city,
        $address_zip,
        $address_province,
        $gender,
        $role_id
    ) {
        $conn = $this->Connect();
    
        // Check if user with the same id_number or email already exists
        $query = "SELECT id_number, email FROM users WHERE id_number = :id_number OR email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_number', $id_number);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            // User already exists
            return false;
        }
    
        // Hash the password 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        // Insert new user
        $query = "INSERT INTO users (id_number, first_name, last_name, middle_initial, email, password, program_id, department_id, contact_number, address_purok, address_barangay, address_city, address_zip, address_province, gender, role_id)
                  VALUES (:id_number, :first_name, :last_name, :middle_initial, :email, :password, :program_id, :department_id, :contact_number, :address_purok, :address_barangay, :address_city, :address_zip, :address_province, :gender, :role_id)";
    
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id_number", $id_number);
        $stmt->bindParam(":first_name", $first_name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":middle_initial", $middle_initial);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashed_password);
        $stmt->bindParam(":program_id", $program_id);
        $stmt->bindParam(":department_id", $department_id);
        $stmt->bindParam(":contact_number", $contact_number);
        $stmt->bindParam(":address_purok", $address_purok);
        $stmt->bindParam(":address_barangay", $address_barangay);
        $stmt->bindParam(":address_city", $address_city);
        $stmt->bindParam(":address_zip", $address_zip);
        $stmt->bindParam(":address_province", $address_province);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":role_id", $role_id);
    
        // Execute the insert query
        if ($stmt->execute()) {
            return true; // User created successfully
        } else {
            // Handle error if the user was not created
            return false;
        }
    }
    
    
    // public function AuthenticateUser($email, $password) {
    //     $conn = $this->Connect();
    //     $stmt = $conn->prepare("SELECT * FROM users_account WHERE email = :email");
    //     $stmt->execute(["email" => $email]);
    //     $user = $stmt->fetch(); 

 
    //     if ($user && password_verify($password, $user["password"])) {
    //         session_start();
    //         $_SESSION["user_id"] = $user["id"];
    //         $_SESSION["email"] = $user["email"];
    //         if($user["role"] == "admin"){
    //             $_SESSION["role"] = "admin";
    //         }else if($user["role"] == "student"){
    //             $_SESSION["role"] = "student";
    //         }
    //         return true; 
    //     }

    //     return false; 
    // }
    public function AuthenticateUser($email, $password) {
        $conn = $this->Connect();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(["email" => $email]);
        $user = $stmt->fetch(); 

 
        if ($user && password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["role"] = $user["role_id"];
            return true; 
        }

        return false; 
    }

    public function getUserById($user_id) {
        $stmt = $this->Connect()->prepare("SELECT *,DATE(created_at) AS date_only,           
        TIME_FORMAT(created_at, '%h:%i:%s %p') AS time_only,  
        MONTHNAME(created_at) AS month_name   FROM users WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetch(); // Returns the user data as an associative array
    }

    public function createPost($post_title, $post_content, $post_when, $category_id){
        $conn = $this->Connect();
    
        // Fix the SQL query by removing the duplicate :user_id
        $query = "INSERT INTO posts (post_title, post_content, post_when, user_id, category_id) 
                  VALUES (:post_title, :post_content, :post_when, :user_id, :category_id)";
    
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':post_title', $post_title);
        $stmt->bindParam(':post_content', $post_content);
        $stmt->bindParam(':post_when', $post_when);
        $stmt->bindParam(':user_id', $_SESSION["user_id"]); // Ensure $_SESSION["user_id"] is set
        $stmt->bindParam(':category_id', $category_id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

}
