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
Route::get('/post/active', function(){
    return "HELLO ACTIVE";
});
Route::get('/scheduledpost/{id}', function($id) {
    require_once('./Controller/UsersController.php');
    UsersController::open_scheduled_post($id);  
});

Route::post('/engagement/{action}', function($action){
    require_once('./Controller/EngagementController.php');
    EngagementController::make_engagement($action);
});

Route::get('/engagement/{action}', function($action){
    require_once('./Controller/EngagementController.php');
    EngagementController::get_engagement($action);
});

Route::get('/calendar', function(){
    View::render('calendar');
});



// For edit profile route
Route::get('/edit-profile', function(){
    require_once('./Controller/EditProfileController.php');
    EditProfileController::show();
});
Route::post('/edit-profile', function(){
    require_once('./Controller/EditProfileController.php');
    EditProfileController::show();
});






$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestUri = "/".$path ;


// Return the request 
Route::dispatch($requestUri);