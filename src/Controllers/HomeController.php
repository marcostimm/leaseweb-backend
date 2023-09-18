<?php

namespace Leaseweb\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use Leaseweb\Services\ServerService;

class HomeController
{
    public function index(ServerRequestInterface $request, ServerService $serverService)
    {
        return json_encode(['message' => 'Hello Leaseweb!']);
    }
}