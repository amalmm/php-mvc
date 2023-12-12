<?php 

namespace App\Core\Helper;
 
class ViewHelper
{
    public static function render($viewFile, $data = [])
    {
        extract($data);
        include  $viewFile;
      }
}
 