<?php 

namespace App\Controller;

use App\Core\Helper\ViewHelper;

class AboutController {
  
    public function index() {
      ViewHelper::render('../View/about.php', []);
    }
}


 