# v1
testing php unit test in existing project

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

# v2 
routeing

#### info :  $_Get vs $_server
> $_SERVER['REQUEST_URI'] will give you " /some-dir/yourpage.php?q=bogus&n=10 "
> Whereas $_GET['q'] will give you:bogus


#### info : parse_url()
> Array ( [path] => /public/index/about [query] => dfsf )

####  info : array destructuring syntax. 

>In PHP, list or [] is a so called "language construct", just like array(). This language construct is used to "pull" variables out of an array. In other words: it will "destructure" the array into separate variables.

```
$array = [1, 2, 3]; 

// Using the list syntax:
list($a, $b, $c) = $array;

// Or the shorthand syntax:
[$a, $b, $c] = $array;

// $a = 1
// $b = 2
// $c = 3
```

#### info : php extract
> The extract function in PHP is used to import variables from an array into the current symbol table
```
$data = ['name' => 'John', 'age' => 25, 'city' => 'New York'];

// Extract variables from the $data array
extract($data);

// Now, you have variables with names based on the array keys
echo $name; // Output: John
echo $age;  // Output: 25
echo $city; // Output: New York
```

#### config 
```
<?php 

define('VIEW_PATH', __DIR__ . '/../src/View/');

```

### unit test | statues code 
> To perform unit tests for checking the HTTP status codes of web pages in PHP, you can use PHPUnit along with a testing library like Guzzle for making HTTP requests. Here's a basic example:

```
{
    "require-dev": {
        "phpunit/phpunit": "^9",
        "guzzlehttp/guzzle": "^7"
    }
}

```
> composer update --dev

```

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class PageStatusTest extends TestCase
{
    protected $client;

    protected function setUp(): void
    {
        $this->client = new Client(['base_uri' => 'http://localhost']);
    }

    public function testHomePageStatus()
    {
        $response = $this->client->get('/');
        $statusCode = $response->getStatusCode();
        $this->assertEquals(200, $statusCode);
    }
```

#### phpunit.xml 

> is a configuration file for PHPUnit, allowing you to customize the behavior of PHPUnit when you run your tests. This file provides a way to specify settings, include bootstrap files, and configure various aspects of test execution.
```
<phpunit
    backupGlobals="false"
    colors="true"
    bootstrap="vendor/autoload.php"
    verbose="true"
    stopOnFailure="true"
>
    <testsuites>
        <testsuite name="My Test Suite">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
</phpunit>

```

#### Understanding Unit Testing


Unit testing and mocking are related concepts but address different aspects of the testing process. Let's break down the differences:

Unit Testing:

Definition: Unit testing is the practice of testing individual units or components of a software application in isolation. A unit is the smallest testable part of an 


Mocking:

Definition: Mocking is a technique used in unit testing to create simulated objects (mock objects) that mimic the behavior of real objects or components. These mock objects allow you to control the behavior of dependencies during testing.

#### GuzzleHttp

> issue session value check : in contner in testing
```
 // Get the response body as a string
        $body = $response->getBody()->getContents();

        // Assert that the session value is not present in the response body
        $this->assertStringNotContainsString('YourSessionValue', $body);
```