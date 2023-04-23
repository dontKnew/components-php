<?php
require 'vendor/autoload.php';

use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$router = new Router;

// For basic GET URI
$router->get('home', function(Request $request, Response $response) {
    $response->setContent('Hello World');
    return $response;

    # OR
    # return 'Hello World!';
});
$router->notFound(function(Request $request, Response $response) {
  // your codes.
});
$router->run();
