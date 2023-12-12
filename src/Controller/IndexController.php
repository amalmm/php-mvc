<?php 

namespace App\Controller;

use App\Core\Helper\ViewHelper;

class IndexController {
  
    public function index() {
      ViewHelper::render('View/index.php', []);
    }
}


 