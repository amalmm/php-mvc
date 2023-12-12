<?php 

require_once '../vendor/autoload.php'; 

// GET URL

$URL = $_GET['url'];
// split url
$URL = explode('/',$URL);
// get controller 


print_r($URL);