<?php

namespace Tests\Integration;

use Leaseweb\Controllers\ServerController;
use Leaseweb\Services\ServerService;
use Leaseweb\Repositories\ServerRepository;
use PHPUnit\Framework\TestCase;

class ServerTest extends TestCase
{

    public function testServer()
    {
        $serverRepository = $this->createMock(ServerRepository::class);
        $serverRepository->expects($this->once())
        ->method('get')
        ->willReturn([]);

        $serverService = new ServerService($serverRepository);
        $serverController = new ServerController($serverService);
        $response = $serverController->list();

        $this->assertSame(json_encode(["data" => []]), $response);
    }
}