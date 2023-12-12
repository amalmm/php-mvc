<?php

require_once 'vendor/autoload.php';
require_once 'routes/web.php';
 
// GET url
$url = $_SERVER['REQUEST_URI'];
$url = parse_url($url)['path'];


// Check if the route exists
if (array_key_exists($url, $routes)) {
    [$controllerClass, $method] = $routes[$url];

    // Check if the controller class and method exist
    if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
        $controller = new $controllerClass();
        $controller->$method();
    } else {
        die('500 Internal Server Error');
    }
} else {
    die('404 Not Found');
}
