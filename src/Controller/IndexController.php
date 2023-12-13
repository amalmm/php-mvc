<?php 

namespace App\Controller;

use App\Core\Helper\ViewHelper;
session_start();
class IndexController {
  
    public function index() {
        ViewHelper::render('index.php');
    }

    public function store() {
            $email = isset( $_GET['email']) ? $_GET['email'] : null ;
            if (empty($email)) {
                 $_SESSION['error']['message'] =  "error : message name field required" ;
                header('Location:/index?error=email requierd ');
                exit();
              }
    }
}


 