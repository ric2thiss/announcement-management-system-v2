<?php
session_start();
require('./Controller/Middleware.php');
require('./Controller/Views.php');
require('./Controller/Route.php');
// require('./Controller/DasboardController.php');

$path = isset($_GET["path"]) ? $_GET["path"] : "";


Route::get('/', function() {
    View::render('login');
});


// Show login view on GET request
Route::get('/login', function() {
    require_once('./Controller/LoginController.php');
    LoginController::login();
});
Route::post('/login', function() {
    require_once('./Controller/LoginController.php');
    LoginController::login();
    // View::render('login');
});

Route::get('/register', function() {
    require_once('./Controller/RegisterController.php');
    RegisterController::register();
});
Route::post('/register', function() {
    require_once('./Controller/RegisterController.php');
    RegisterController::register();
});

Route::get('/logout', function(){
    session_unset();
    session_destroy();
    header("Location: ./login"); 
    exit(); 
});
Route::get('/dashboard', function(){
    require_once('./Controller/DasboardController.php');
    DashboardController::show();
});
Route::post('/dashboard', function(){
    require_once('./Controller/AnnouncementController.php');
    // DashboardController::show();
    AnnouncementController::post();
});




$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestUri = "/".$path ;

// Return the request 
Route::dispatch($requestUri);








// $segments = explode('/', $path);
// // print_r($segments);

// if($segments[0] === "home"){
//     include_once('home.html');
// }else if($segments[0] === "dashboard"){
//     include_once('dashboard.html');
// }else if(str_contains($segments[0], "calendar")){
//     // $link = $segments[0];
//     // $link = str_replace(".js", "", $link);
//     // include_once($link.'.html');
//     include_once('404.html');
// }else{
//     http_response_code(404);
//     echo json_encode(['error' => 'Route not found']);
// }

// if(count($segments)==1 && $segments[0] === "home"){
//     $path = (int)$segments[1];
//     echo $path;
// }else {
//     // For any other routes, return a 404 response
//     http_response_code(404);
//     echo $path;
//     echo json_encode(['error' => 'Route not found']);
// }