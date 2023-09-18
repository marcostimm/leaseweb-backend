<?php declare(strict_types=1);

use FastRoute\RouteCollector;

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/',                ['Leaseweb\Controllers\HomeController', 'index']);
    $r->addRoute('GET', '/server',          ['Leaseweb\Controllers\ServerController', 'list']);
    $r->addRoute('GET', '/server/{id:\d+}', ['Leaseweb\Controllers\ServerController', 'detail']);
});