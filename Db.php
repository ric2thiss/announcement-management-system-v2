<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "amsystem2";

    public function Connect(){
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit; 
        }
    }
}

// class TestConn extends Database{
//     public function testConn(){
//         return $this->Connect();
//     }
// }


// $conn = new TestConn();

// if($conn->testConn()){
//     echo "Connected to database";
// }else{
//     echo "Failed to connect to database";
// }