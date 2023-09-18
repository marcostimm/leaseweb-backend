<?php 

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

// Load the environment variables
try {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
} catch (InvalidPathException $e) {
    
}

// Initiate the container
$container = require base_path('/bootstrap/container.php');
// Load the routes
require base_path('/bootstrap/routes.php');

switch ($route[0]) {
    case \FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;

    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo '405 Method Not Allowed';
        break;

    case \FastRoute\Dispatcher::FOUND:
        $controller = $route[1];
        $parameters = $route[2];

        $uri = $_SERVER['REQUEST_URI'];
        $query = [];
        if (isset($_SERVER['QUERY_STRING'])) {
            parse_str($_SERVER['QUERY_STRING'], $query);
        }

        $response = $container->call($controller, ['query' => $query, 'parameters' => $parameters]);
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        echo $response;
        exit;
}
