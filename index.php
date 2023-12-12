<?php 

require_once 'vendor/autoload.php'; 

// GET url

$url =  $_SERVER['REQUEST_URI'];
$url = parse_url($url)['path'];
 
$routes = [ "/" => "IndexController",
            "/about" => "AboutController" ];

if(array_key_exists($url, $routes)){
	require_once  "src/Controller/" . $routes[$url] . ".php";
}else{
	die('404');
}