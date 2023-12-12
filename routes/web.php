<?php

use App\Controller\IndexController;
use App\Controller\AboutController;

$routes = [
    "/"     => [IndexController::class, 'index'],
    "/about" => [AboutController::class, 'index']
]; 