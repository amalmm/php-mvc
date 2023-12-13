<?php

namespace Tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

use App\Controller\IndexController;

class IndexTest extends TestCase {

    protected $client;

    protected function setUp(): void
    {
        $this->client = new Client(['base_uri' => 'http://localhost:8000']);
    }

    public function testHomePageStatus()
    {
        $response = $this->client->get('/');
        $statusCode = $response->getStatusCode();
        $this->assertEquals(200, $statusCode);
    }

     public function testIndexPageStore()
    {
       $response = $this->client->get('/index/store',[
                 'email'=>'',
                 'allow_redirects' => [
                    'max'             => 5,        // Maximum number of redirects to follow
                    'strict'          => true,     // Use strict redirects (e.g., check for safe methods)
                    'referer'         => true,     // Add the Referer header when following redirects
                    'protocols'       => ['http', 'https'], // Allowed redirect protocols
                    'track_redirects' => true,     // Store redirect information in the "history" request option
                ],
            ] );
   
     }

}