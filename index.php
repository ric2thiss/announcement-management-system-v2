<?php
session_start();
require('./Controller/Middleware.php');
require('./Controller/Views.php');
require('./Controller/Route.php');

$path = isset($_GET["path"]) ? $_GET["path"] : "";


Route::get('/', function() {
    Middleware::isLoggedIn(); 
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
});

Route::get('/register', function() {
    require_once('./Controller/RegisterController.php');
    Middleware::isLoggedIn(); 
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
    AnnouncementController::post();
});
Route::post('/category', function(){
    require_once('./Controller/CategorySectionController.php');
    Category::create();
});

Route::get("/home", function(){
    require_once('./Controller/HomeController.php');
    HomeController::show();
    });

// API end point
// Users
Route::get('/user/{id}', function($id) {
    require_once('./Controller/UsersController.php');
    UsersController::find($id);  
});
// Posts
Route::get('/posts/{id}', function($id) {
    require_once('./Controller/UsersController.php');
    UsersController::open_pinned_post($id);  
});
Route::get('/pending/{id}', function($id) {
    require_once('./Controller/UsersController.php');
    UsersController::open_scheduled_post($id);  
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