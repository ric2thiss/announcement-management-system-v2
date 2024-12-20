<?php

// class Route {

//     private static $routes = [];

//     public static function get($route, $callback) {
//         self::$routes[$route] = $callback;

//         // print_r(self::$routes);
//     }


//     public static function dispatch($requestedRoute) {
//         foreach (self::$routes as $route => $callback) {
//             if ($route === $requestedRoute) {

//                 return call_user_func($callback);
//             }
//         }
//         http_response_code(404);
//         echo "<h1 class='text-center'>404 Not Found</h1>";
//     }

// }


// class Route {
//     private static $getRoutes = [];
//     private static $postRoutes = [];

//     public static function get($path, $callback) {
//         self::$getRoutes[$path] = $callback;
//     }

//     public static function post($path, $callback) {
//         self::$postRoutes[$path] = $callback;
//     }

//     public static function dispatch($requestUri) {
//         $requestMethod = $_SERVER['REQUEST_METHOD'];
        
//         if ($requestMethod === 'GET' && isset(self::$getRoutes[$requestUri])) {
//             call_user_func(self::$getRoutes[$requestUri]);
//         } elseif ($requestMethod === 'POST' && isset(self::$postRoutes[$requestUri])) {
//             call_user_func(self::$postRoutes[$requestUri]);
//         } else {
//             // Route not found or method not allowed
//             http_response_code(404);
//             echo "<h1>404 Not Found</h1>";
//         }
//     }
// }

class Route {
    private static $getRoutes = [];
    private static $postRoutes = [];

    public static function get($path, $callback) {
        self::$getRoutes[$path] = $callback;
    }

    public static function post($path, $callback) {
        self::$postRoutes[$path] = $callback;
    }

    public static function dispatch($requestUri) {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        
        // Select routes based on request method
        $routes = $requestMethod === 'GET' ? self::$getRoutes : self::$postRoutes;

        foreach ($routes as $route => $callback) {
            $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);
            $pattern = str_replace('/', '\/', $pattern);
            
            if (preg_match('/^' . $pattern . '$/', $requestUri, $matches)) {
                array_shift($matches);  // Remove the full match
                
                return call_user_func_array($callback, $matches);
            }
        }

        // Route not found
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
    }
}


