<?php
require 'vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'home_handler');
    $r->addRoute('GET', '/about', 'about_handler');
    $r->addRoute('GET', '/users/{id:\d+}', 'user_handler');
    $r->addRoute('POST', '/users', 'save_user_handler');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}

function home_handler() {
    echo 'Home page';
}

function about_handler() {
    echo 'About page';
}

function user_handler($vars) {
    echo 'User page for user with ID: ' . $vars['id'];
}

function save_user_handler() {
    echo 'Saving user...';
}
