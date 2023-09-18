<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Leaseweb\Services\ServerService;
use Leaseweb\Repositories\ServerRepository;

final class ServerServiceTest extends TestCase
{
    public function testListMethodShouldReturnServers(): void
    {
        $serves = [
            [
                'id' => 0,
                'name' => 'Server 1',
                'location' => 'AmsterdamAMS-01',
                'price' => 99.99,
                'hdd' => '2x 4TB HDD',
                'ram' => '32GB DDR4'
            ],
            [
                'id' => 1,
                'name' => 'Server 2',
                'location' => 'FrankfurtFRA-10',
                'price' => 49.99,
                'hdd' => '2x 4TB HDD',
                'ram' => '32GB DDR4'
            ]
            ];

        $serverRepository = $this->createMock(ServerRepository::class);

        $serverRepository->expects($this->once())
            ->method('get')
            ->willReturn($serves);

        $serverService = new ServerService($serverRepository);

        $this->assertSame($serves, $serverService->list());
    }

}