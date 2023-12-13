<?php

use App\Controller\IndexController;
use App\Controller\AboutController;

$routes = [
    "/"     => [IndexController::class, 'index'],
    "/index"     => [IndexController::class, 'index'],
    "/index/store"  => [IndexController::class, 'store'],
    "/about" => [AboutController::class, 'index']
]; 
