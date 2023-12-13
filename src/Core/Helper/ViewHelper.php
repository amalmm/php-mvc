<?php 

namespace App\Core\Helper;
 
class ViewHelper
{
    public static function render($viewFile, $data = [])
    {
        $filePath = VIEW_PATH . $viewFile;
        extract($data);
        include $filePath;
      }
}
 