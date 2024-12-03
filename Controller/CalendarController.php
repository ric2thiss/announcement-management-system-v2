<?php

require('./Model/UserModel.php');
class CalendarController extends Users{

    public static function index(){

        View::render('calendar');
    }


    public static function event_api() {
        $event = Users::Get_Posts_For_Calender(); // Assume this returns an array of data
    
        // Set the correct Content-Type header for JSON
        header('Content-Type: application/json');
    
        // Output the JSON-encoded data (only once)
        echo json_encode($event);
        exit;
    }
    
    

}