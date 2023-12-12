## unit test

#### install composer
```
 composer init init
```

#### namespace  
composer.json > autoload > psr4  > namespace point to src
```
 "autoload": {
        "psr-4": {
            "Sienti\\": "src/"
        }
    },
```

#### Test framwork
install test framework as dev dpentancy
```
   "require-dev": {
        "phpunit/phpunit": "^9"
    }
```  

> composer update

composer.json>autoload-dev>psr4 > namaep pont to tests
```
   "autoload-dev": {
        "psr-4": {
            "Sienti\\Testcase\\": "tests/"
        }
    },
```

#### Create a new test class 
>creat anew tests  folder > create  test clasee > extend php unit frameword test case
```
<?php

namespace Sienti\Testcase;

use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase {

    public function testSomething() {
    
        // Your test logic goes here
        $this->assertTrue(true);
        
    }
}
```

#### Test function
> test function start with test_ 

#### Run Test 
```
vendor\bin\phpunit tests 
```

#### To test post request 
> use GuzzleHttp\Client;
```
        // Set up the necessary data
        $postData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ];

        // Make a POST request
        $response = $client->post('http://your-app-url/process.php', [
            'form_params' => $postData,
        ]);

        // Get the response content
        $content = $response['content'];

        // Assert that the response contains expected content
        $this->assertStringContainsString('Name: John Doe', $content);

```

#### To call a controller from an index page
```
// index.php
 
require_once 'YourController.php';

$controller = new YourController();

$controller->index();
```

### Issue 
> post request / get request not essy in test case 

### To display a class methord
```
 require_once '../../vendor/autoload.php'; 
 
 $getClassMethod = get_class_methods(PHPUnit\Framework\TestCase::class); 
 
 var_dump($getClassMethod);
 ```
or 
```
require_once '../../vendor/autoload.php'; 

$reflectionClass = new ReflectionClass(PHPUnit\Framework\TestCase::class);

$methods = $reflectionClass->getMethods();

$properties = $reflectionClass->getProperties();
```

#### robots.txt
> tell searche engine not to display 
```
User-agent: *
Disallow: /admin/
```

#### .htaccess
> point all request to public/index.php default  | ONLY WORK WITHOUT PORT | DURING PORT THE HTACCESS IS NOT USED
```
<IfModule mod_rewrite.c>
    RewriteEngine On

    #ACCEPT LOADING OF ACTUAL FILA ND DIR
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d

    # Redirect all requests to index.php  
    RewriteRule ^(.*) index.php?url=$1 [L,QSA]

</IfModule>

```