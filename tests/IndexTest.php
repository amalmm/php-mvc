<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Controller\IndexController;

class IndexTest extends TestCase {


     public function test_index_post_request() {

         $controller = new IndexController();
         $result = $controller->postRequest();
         
         $this->assertEquals($result, '123');

         

    }


}