<?php

use Symfony\Component\Validator\Constraints\Date;

require('./Db.php');

class Users extends Database {
    public function getScheduledpost(){
        $conn = $this->Connect();
        $stmt = $conn->prepare("SELECT 
                                p.*, 
                                u.*, 
                                sp.*,  
                                DATE_FORMAT(sp.schedule_date, '%d, %Y') AS date_only, 
                                MONTHNAME(sp.schedule_date) AS month_name
                            FROM 
                                scheduled_posts sp
                            INNER JOIN 
                                posts p ON sp.post_id = p.post_id
                            INNER JOIN 
                                users u ON p.user_id = u.user_id  -- Assuming p.user_id links to users
                            WHERE 
                                DATE(sp.schedule_date) > CURRENT_DATE
                            ORDER BY 
                                sp.schedule_date ASC;

                                ;
                                ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPinnedPost() {
        $conn = $this->Connect();
        $stmt = $conn->prepare("SELECT pp.*, p.*,u.first_name, u.last_name, u.user_id
                                FROM posts p
                                INNER JOIN pinned_posts pp ON p.post_id = pp.post_id
                                INNER JOIN users u ON p.user_id = u.user_id
                                WHERE DATE(pinned_date) = CURDATE();
                                ");
    
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch all matching rows as an associative array
        
        return $result; // Return the retrieved posts
    }    

    public function getCategories() {
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
        self::setPinnedPosts();
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
     
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["role"] = $user["role_id"];

            self::setPinnedPosts();


            return true; 
        }

        return false; 
    }

    public function getUserById($user_id) {
        $stmt = $this->Connect()->prepare("SELECT *,DATE(created_at) AS date_only,           
                                           TIME_FORMAT(created_at, '%h:%i:%s %p') AS time_only,  
                                           MONTHNAME(created_at) AS month_name , role_name,
                                           d.department_name, p.program_name
                                           FROM users 
                                           INNER JOIN roles on users.role_id = roles.role_id
                                           INNER JOIN departments d on users.department_id = d.department_id
                                           INNER JOIN programs p on users.program_id = p.program_id
                                           WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetch(); // Returns the user data as an associative array
    }

    public function createPost($post_title, $post_content, $post_when, $category_id, $target_file){
        $conn = $this->Connect();
    
        // Fix the SQL query by removing the duplicate :user_id
        $query = "INSERT INTO posts (post_title, post_content, post_when, user_id, category_id, images) 
                  VALUES (:post_title, :post_content, :post_when, :user_id, :category_id, :images)";
    
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':post_title', $post_title);
        $stmt->bindParam(':post_content', $post_content);
        $stmt->bindParam(':post_when', $post_when);
        $stmt->bindParam(':user_id', $_SESSION["user_id"]); // Ensure $_SESSION["user_id"] is set
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(":images", $target_file);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function setPinnedPosts(){
        $db = new Database();
        $conn = $db->Connect();
        $conn->beginTransaction();
            
        $stmtPinnedPosts = $conn->prepare("INSERT INTO pinned_posts (post_id, pinned_date)
        SELECT post_id, CURDATE()
        FROM posts
        WHERE DATE(post_when) = CURDATE()
        AND NOT EXISTS (
            SELECT 1 FROM pinned_posts
            WHERE pinned_posts.post_id = posts.post_id
            AND pinned_date = CURDATE()
        )
    ");
    
        $stmtPinnedPosts->execute();
        
        // Commit the transaction
        $conn->commit();
    }


    public static function find($id) {
        $db = new Database();
        $conn = $db->Connect();
    
        $stmt = $conn->prepare("SELECT posts.*, users.*, pinned_posts.*, categories.*, 
                                departments.*, programs.*, roles.*, scheduled_posts.*, 
                                DATE(users.created_at) AS date_only,           
                                TIME_FORMAT(users.created_at, '%h:%i:%s %p') AS time_only,  
                                MONTHNAME(users.created_at) AS month_name 
                                FROM users
                                INNER JOIN posts ON users.user_id = posts.user_id
                                LEFT JOIN pinned_posts ON posts.post_id = pinned_posts.post_id
                                LEFT JOIN categories ON posts.category_id = categories.category_id
                                LEFT JOIN departments ON users.department_id = departments.department_id
                                LEFT JOIN programs ON users.program_id = programs.program_id
                                LEFT JOIN roles ON users.role_id = roles.role_id
                                LEFT JOIN scheduled_posts ON posts.post_id = scheduled_posts.post_id
                                WHERE users.user_id = :user_id");
    
        $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        }
        return null;
    }
    
    

    public static function getPinnedPostPage($id) {
        $db = new Database();
        $conn = $db->Connect();
        
        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT pinned_posts.*, posts.*, users.*, programs.*, departments.*, roles.*, categories.*,
                                DATE_FORMAT(pinned_posts.pinned_date, '%d') AS date_only,           
                                TIME_FORMAT(pinned_posts.pinned_date, '%h:%i %p') AS time_only,  
                                MONTHNAME(pinned_posts.pinned_date) AS month_name 
                                FROM pinned_posts 
                                INNER JOIN posts ON pinned_posts.post_id = posts.post_id
                                INNER JOIN users ON posts.user_id = users.user_id
                                INNER JOIN programs ON users.program_id = programs.program_id
                                INNER JOIN departments ON users.department_id = departments.department_id
                                INNER JOIN roles ON users.role_id = roles.role_id
                                INNER JOIN categories ON posts.category_id = categories.category_id
                                WHERE pinned_id = :pinned_id");
        $stmt->bindParam(":pinned_id", $id);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Fetch a single record
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result : null; 
        } else {
            return null;
        }
    }


    public static function getScheduledPostPage($id) {
    try {
        $db = new Database();
        $conn = $db->Connect();
        
        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT 
                                    scheduled_posts.*, 
                                    posts.*, 
                                    users.*, 
                                    programs.*, 
                                    departments.*, 
                                    roles.*, 
                                    categories.*, 
                                    DATE_FORMAT(scheduled_posts.schedule_date, '%d') AS date_only, 
                                    MONTHNAME(scheduled_posts.schedule_date) AS month_name, 
                                    TIME_FORMAT(scheduled_posts.schedule_date, '%h:%i %p') AS time_only
                                FROM 
                                    scheduled_posts 
                                INNER JOIN 
                                    posts ON scheduled_posts.post_id = posts.post_id
                                INNER JOIN 
                                    users ON posts.user_id = users.user_id
                                INNER JOIN 
                                    programs ON users.program_id = programs.program_id
                                INNER JOIN 
                                    departments ON users.department_id = departments.department_id
                                INNER JOIN 
                                    roles ON users.role_id = roles.role_id
                                INNER JOIN 
                                    categories ON posts.category_id = categories.category_id
                                WHERE 
                                    scheduled_posts.scheduled_id = :scheduled_id
                                LIMIT 1;");

        // Bind the parameter and execute
        $stmt->bindParam(":scheduled_id", $id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Check if data was found
        if ($result) {
            return $result;
        } else {
            // Log or handle no data found
            echo "No data found for scheduled_id = $id.";
            return null;
        }
    } catch (PDOException $e) {
        // Log the error message
        echo "Error: " . $e->getMessage();
        return null;
    }
}

    // For Home Page

    public static function getAllPosts(){
        $db = new Database();

        $conn = $db->Connect();
        $stmt = 
                 $conn->prepare("SELECT posts.*, users.*, departments.*, programs.*, roles.*,
                                DATE_FORMAT(posts.created_at, '%d') AS date, 
                                MONTHNAME(posts.created_at) AS month, 
                                TIME_FORMAT(posts.created_at, '%h:%i %p') AS time
                                FROM posts
                                INNER JOIN users ON users.user_id = posts.user_id
                                INNER JOIN departments ON users.department_id = departments.department_id
                                INNER JOIN programs ON users.program_id = programs.program_id
                                INNER JOIN roles ON users.role_id = roles.role_id
                                LEFT JOIN scheduled_posts ON posts.post_id = scheduled_posts.post_id
                                WHERE scheduled_posts.schedule_date IS NULL 
                                OR DATE(scheduled_posts.schedule_date) <= NOW()
                                ORDER BY posts.post_id DESC;
;
                                ");
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function activePostNumber(){
        $conn = $this->Connect();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM posts WHERE user_id = :user_id");
        $stmt->bindParam(":user_id", $_SESSION["user_id"]);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }

    public function scheduledPostsNumber(){
        $conn = $this->Connect();
        $stmt = $conn->prepare("SELECT COUNT(*) 
                                FROM scheduled_posts sp
                                INNER JOIN posts ON posts.post_id = sp.post_id
                                WHERE posts.user_id = :user_id;"
                                );
        $stmt->bindParam(":user_id", $_SESSION["user_id"]);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }

    public static function createCategory(){
        $db = new Database();
        $conn = $db->Connect();
        $stmt = $conn->prepare("INSERT INTO categories(category_name) VALUES (:category_name)");
        $stmt->bindParam(":category_name", $_POST["category_name"], PDO::PARAM_STR);
        $result = $stmt->execute();

        if($result){
            return true;
        }else{
            return false;
        }

    }
        
    

}
