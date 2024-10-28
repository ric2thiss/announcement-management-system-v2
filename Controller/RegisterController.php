<?php
require('./Model/UserModel.php');
class RegisterController{

    public static function register() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_number = htmlspecialchars($_POST["idnumber"]);
            $first_name = htmlspecialchars($_POST["firstname"]);
            $last_name = htmlspecialchars($_POST["lastname"]);
            $middle_initial = htmlspecialchars($_POST["middleinitial"]);
            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            $password = htmlspecialchars($_POST["password"]);
            $program_id = htmlspecialchars($_POST["program"]); // Assuming program ID is sent
            $department_id = htmlspecialchars($_POST["department"]); // Assuming department ID is sent
            $contact_number = htmlspecialchars($_POST["contactnumber"]);
            $address_purok = htmlspecialchars($_POST["purok"]);
            $address_barangay = htmlspecialchars($_POST["barangay"]);
            $address_city = htmlspecialchars($_POST["city"]);
            $address_province = htmlspecialchars($_POST["province"]);
            $address_zip = htmlspecialchars($_POST["zip"]);
            $gender = htmlspecialchars($_POST["sex"]);
            $role_id = htmlspecialchars($_POST["role"]);
    
            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Invalid email format.');</script>";
                return;
            }
    
            // Check for empty fields
            if (empty($id_number) || empty($first_name) || empty($last_name) || empty($middle_initial) || empty($email) || empty($password) || empty($program_id) || empty($department_id) || empty($contact_number) || empty($address_purok) || empty($address_barangay) || empty($address_city) || empty($address_province) || empty($address_zip)) {
                echo "<script>alert('Please fill up all the required fields.');</script>";
                return;
            }
    
            $userModel = new Users();
    
            // Attempt to create the user
            if ($userModel->CreateUser($id_number, $first_name, $last_name, $middle_initial, $email, $password, $program_id, $department_id, $contact_number, $address_purok, $address_barangay, $address_city, $address_zip, $address_province, $gender, $role_id)) {
                echo "<script>alert('Registration successful.');</script>";
                echo "<script>window.location.href='./login';</script>";
            } else {
                echo "<script>alert('Registration failed. Email or ID already exists in the database.');</script>";
            }
        } else {
            // Middleware logic can be added here if needed
            $userModel = new Users();
            $initialData = $userModel->getInitialData();
    
            if ($initialData) {
                // Pass the data to the view
                View::render('register', [
                    'roles' => $initialData['roles'],
                    'programs' => $initialData['programs'],
                    'departments' => $initialData['departments']
                ]);
            } else {
                echo "<script>alert('Error fetching data.');</script>";
            }
        }
    }
    

    // public static function register(){ 
    //     if($_SERVER["REQUEST_METHOD"] === "POST"){
    //         $idnumber = htmlspecialchars($_POST["idnumber"]);
    //         $firstname = htmlspecialchars($_POST["firstname"]);
    //         $lastname = htmlspecialchars($_POST["lastname"]);
    //         $middleinitial = htmlspecialchars($_POST["middleinitial"]);
    //         $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    //         $password = htmlspecialchars($_POST["password"]); 
    //         $program = htmlspecialchars($_POST["program"]);
    //         $department = htmlspecialchars($_POST["department"]);
    //         $contactnumber = htmlspecialchars($_POST["contactnumber"]);
    //         $purok = htmlspecialchars($_POST["purok"]);
    //         $barangay = htmlspecialchars($_POST["barangay"]);
    //         $city = htmlspecialchars($_POST["city"]);
    //         $province = htmlspecialchars($_POST["province"]);
    //         $zip = htmlspecialchars($_POST["zip"]);

    //         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //             echo "Invalid email format.";
    //             return;
    //         }else if(empty($idnumber)||empty($firstname)||empty($lastname)||empty($email)||empty($password)||empty($program)||empty($department)||empty($middleinitial)||empty($contactnumber)||empty($purok)||empty($barangay)||empty($city)||empty($province)||empty($zip)){
    //             echo "<script>alert('Please fill up all the required fields.');</script>";
    //             return;
    //         }else{
    //             $userModel = new Users();
            
    //             if($userModel->CreateUser($idnumber, $first_name, $last_name,$middle_initial, $email, $password, $program_id, $department_id, $contactnumber, $address_purok, $address_barangay, $address_city,$address_zip, $address_province, $gender, $role_id)){
    //                 echo "<script>alert('Registration successful.');</script>";
    //                 echo "<script>window.location.href='./login';</script>";
    //                 // header("Location: ./login");
    //             }else{
    //                 echo "<script>alert('Registration failed. Email or ID is already existed in the database');</script>";
    //             }
    //         }

    //     }else {
    //         // require_once("./Controller/Middleware.php");
    //         // Middleware::Authenticate();
    //         $userModel = new Users();

    //         $initialData = $userModel->getInitialData();

    //         if ($initialData) {
    //             // Pass the data to the view
    //             View::render('register', [
    //                 'roles' => $initialData['roles'],
    //                 'programs' => $initialData['programs'],
    //                 'departments' => $initialData['departments']
    //             ]);
    //         } else {
    //             echo "Error fetching data.";
    //         }
    //     }
    // }

    
}