<?php

require_once 'vendor/autoload.php';

use App\Controller\IndexController;
use App\Controller\AboutController;

// GET url
$url = $_SERVER['REQUEST_URI'];
$url = parse_url($url)['path'];

// Define routes
$routes = [
    "/"     => [IndexController::class, 'index'],
    "/about" => [AboutController::class, 'index']
];

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
